@extends('layouts.app')



@include('order.detailAndEndedOrders', [
    'buttonName' => 'انهاء الطلب',
    'modelId' => 'endOrderModal',
    'order' => $order,
    'comments' => $comments,
])


@section('scripts')
    {{-- <script>
        function ShowHide($id) {
            // console.log($id);
            if ($id) {
                $('.menu').toggle("slide");
            }
        }
    </script> --}}

    <script>
        $(document).ready(function() {
            // var id= "show"+
            $(".reply-comment").click(function() {
                var target = $(this).attr("id");
                console.log(target);
                if (target) {
                    $('.menu').toggle("slide");
                }

            });
        });
    </script>

    <script>
        function myFunction() {
            // Get the text field
            var copyMobile = document.getElementById("myMobile");

            copyMobile.select();
            copyMobile.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field
            navigator.clipboard.writeText(copyMobile.value);


            document.querySelector(".copyText").innerHTML = "تم النسخ";

        }
    </script>
@endsection
