// Initialize Firebase
var config = {
  apiKey: "AIzaSyB6M9ZFNHcZ0zGl5n9Fl4veyjeH8NL7ChU",
  authDomain: "tourlancers-logins.firebaseapp.com",
  databaseURL: "https://tourlancers-logins.firebaseio.com",
  projectId: "tourlancers-logins",
  storageBucket: "tourlancers-logins.appspot.com",
  messagingSenderId: "213279812943"
};
firebase.initializeApp(config);
function google(){
  var provider = new firebase.auth.GoogleAuthProvider();
firebase.auth().signInWithPopup(provider).then(function(result) {
  // This gives you a Google Access Token. You can use it to access the Google API.
  var token = result.credential.accessToken;
  // The signed-in user info.
  var user = result.user;
  console.log(user.displayName);
  console.log(user.email);
  // ...
}).catch(function(error) {
  // Handle Errors here.
  var errorCode = error.code;
  var errorMessage = error.message;
  console.log(errorCode);
  console.log(errorMessage)
  // The email of the user's account used.
  var email = error.email;
  // The firebase.auth.AuthCredential type that was used.
  var credential = error.credential;
  // ...
});

// Step 1.
// User tries to sign in to Google.
auth.signInWithPopup(new firebase.auth.GoogleAuthProvider()).catch(function(error) {
  // An error happened.
  if (error.code === 'auth/account-exists-with-different-credential') {
    // Step 2.
    // User's email already exists.
    // The pending Google credential.
    var pendingCred = error.credential;
    // The provider account's email address.
    var email = error.email;
    // Get sign-in methods for this email.
    auth.fetchSignInMethodsForEmail(email).then(function(methods) {
      // Step 3.
      // If the user has several sign-in methods,
      // the first method in the list will be the "recommended" method to use.
      if (methods[0] === 'password') {
        // Asks the user his password.
        // In real scenario, you should handle this asynchronously.
        var password = promptUserForPassword(); // TODO: implement promptUserForPassword.
        auth.signInWithEmailAndPassword(email, password).then(function(user) {
          // Step 4a.
          return user.link(pendingCred);
        }).then(function() {
          // Google account successfully linked to the existing Firebase user.
          goToApp();
        });
        return;
      }

      // TODO: implement getProviderForProviderId.
      var provider = getProviderForProviderId(methods[0]);
      auth.signInWithPopup(provider).then(function(result) {
        result.user.linkAndRetrieveDataWithCredential(pendingCred).then(function(usercred) {
          // Google account successfully linked to the existing Firebase user.
          goToApp();
        });
      });
    });
  }
});

}
