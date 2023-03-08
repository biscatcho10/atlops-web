<div>
    {{-- The best athlete wants his opponent at his best. --}}

    @section('content')
        {{-- <section class="messages mt-5">
            <div class="container">

                <h3 class="head-message fw-bold">الرسائل</h3>

                <div class="row">

                    <div class="chat_container">

                        <div class="chat_list_container">
                            @livewire('chat.chat-list')
                        </div>

                        <div class="chat_box_container">
                            @livewire('chat.chatbox')
                            @livewire('chat.send-message')
                        </div>
                    </div>

                </div>
            </div>
        </section> --}}

        <section class="messages mt-5">
            <div class="container">

                <h3 class="head-message fw-bold">الرسائل</h3>
                <div class="row">

                    @livewire('chat.chat-list')

                    @livewire('chat.chatbox')

                    {{-- @livewire('chat.send-message') --}}


                </div>
            </div>
        </section>
    @endsection

    @section('scripts')
        <script>
            window.addEventListener('chatSelected', event => {
                $('.cont-messages').scrollTop($('.cont-messages')[0].scrollHeight);
            });
        </script>
    @endsection

</div>
