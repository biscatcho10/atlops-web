<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="https://kit.fontawesome.com/b4c05b8dbd.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>
<script src="{{ asset('js/dselect.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

{{-- <script>
    $("#notify").load(window.location.href + "#notify");
</script> --}}




{{-- <script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.17.1/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.17.1/firebase-analytics.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries
  
    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
      apiKey: "AIzaSyBqT1-GkH853dHjTUFobaK87mwFH48hAa4",
      authDomain: "atlopsnotification.firebaseapp.com",
      projectId: "atlopsnotification",
      storageBucket: "atlopsnotification.appspot.com",
      messagingSenderId: "826378549870",
      appId: "1:826378549870:web:5a560e2e7dcfa80808847f",
      measurementId: "G-0D6PR39XLN"
    };
  
    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
  </script> --}}

{{-- <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>

<script >
    // import {
    //     initializeApp
    // } from "https://www.gstatic.com/firebasejs/9.17.1/firebase-app.js";
    // import {
    //     getAnalytics
    // } from "https://www.gstatic.com/firebasejs/9.17.1/firebase-analytics.js";

    var firebaseConfig = {
        apiKey: "AIzaSyBqT1-GkH853dHjTUFobaK87mwFH48hAa4",
        authDomain: "atlopsnotification.firebaseapp.com",
        projectId: "atlopsnotification",
        storageBucket: "atlopsnotification.appspot.com",
        messagingSenderId: "826378549870",
        appId: "1:826378549870:web:5a560e2e7dcfa80808847f",
        measurementId: "G-0D6PR39XLN"
    };

    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

    function startFCM() {
        messaging
            .requestPermission()
            .then(function() {
                return messaging.getToken()
            })
            .then(function(response) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route('store.token') }}',
                    type: 'POST',
                    data: {
                        token: response,
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        // alert('Token stored.');
                    },
                    error: function(error) {
                        alert(error);
                    },
                });
            }).catch(function(error) {
                alert(error);
            });
    }
    messaging.onMessage(function(payload) {
        const title = payload.notification.title;
        const options = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(title, options);
    });
</script> --}}
{{-- FCM key : AAAAwGf_-m4:APA91bEY2ISTK0yqCd_C8jkFS5n-BRVnzKBaOZ3KYHWr4M2cuFbEDgc9tPrelBo3eeuAR3C1wapC-DzTaB_WkLMuSFSWouyv-9uQKJ_nEZz4BDkl3Wk5xVovnw9GQCv2Ig-BXxu_SmOW --}}

{{-- sender_id : 826378549870 --}}

<script>
    $(document).ready(function(e) {
        // startFCM();
        $('#upload-photo').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image-before-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
