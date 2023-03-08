// /*
// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
// */
// importScripts('https://www.gstatic.com/firebasejs/9.17.1/firebase-app.js');
// importScripts('https://www.gstatic.com/firebasejs/9.17.1/firebase-analytics.js');


// /*
// Initialize the Firebase app in the service worker by passing in the messagingSenderId.
// * New configuration for app@pulseservice.com
// */
// firebase.initializeApp({
//     apiKey: "AIzaSyBqT1-GkH853dHjTUFobaK87mwFH48hAa4",
//     authDomain: "atlopsnotification.firebaseapp.com",
//     projectId: "atlopsnotification",
//     storageBucket: "atlopsnotification.appspot.com",
//     messagingSenderId: "826378549870",
//     appId: "1:826378549870:web:5a560e2e7dcfa80808847f",
//     measurementId: "G-0D6PR39XLN"
// });

// /*
// Retrieve an instance of Firebase Messaging so that it can handle background messages.
// */
// const messaging = firebase.messaging();
// messaging.setBackgroundMessageHandler(function(payload) {
//   console.log(
//     "[firebase-messaging-sw.js] Received background message ",
//     payload,
//   );
//   /* Customize notification here */
//   const notificationTitle = "Background Message Title";
//   const notificationOptions = {
//     body: "Background Message body.",
//     icon: "/itwonders-web-logo.png",
//   };

//   return self.registration.showNotification(
//     notificationTitle,
//     notificationOptions,
//   );
// });


// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
firebase.initializeApp({
  apiKey: "AIzaSyBqT1-GkH853dHjTUFobaK87mwFH48hAa4",
  authDomain: "atlopsnotification.firebaseapp.com",
  projectId: "atlopsnotification",
  storageBucket: "atlopsnotification.appspot.com",
  messagingSenderId: "826378549870",
  appId: "1:826378549870:web:5a560e2e7dcfa80808847f",
  measurementId: "G-0D6PR39XLN"
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    console.log("Message received.", payload);
    const title = "Hello world is awesome";
    const options = {
        body: "Your notificaiton message .",
        icon: "/firebase-logo.png",
    };
    return self.registration.showNotification(
        title,
        options,
    );
});