<div class="col-lg-4">
    <div class="bg-white py-3 side-menu">

        <div class="chatlist_header">
            <div class="d-flex  px-4 ">
                <img src="{{ asset('Attachments/user/' . $this->getChatAuthUser($name = 'photo')) }}" width="60px"
                    height="60px">
                <div class="mx-2">
                    <h6 class="my-name">{{ $this->getChatAuthUser($name = 'firstName') }}
                        {{ $this->getChatAuthUser($name = 'lastName') }}</h6>
                    <div class="d-flex align-items-center">
                        <span class="dot"></span>
                        <p class="status mx-2 mb-0">نشط الآن</p>

                    </div>
                </div>
            </div>
        </div>

        <div class="chatlist_body">

            <div class="search  px-4 ">
                <input type="text" class="form-control my-3 py-2" placeholder="ابحث عن محادثة الان">
                <button>
                    <i class="fa-solid fa-magnifying-glass fa-xl"></i>
                </button>

            </div>


            <div class="d-flex align-items-start contacts">
                <div class="nav flex-column nav-pills w-100" id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">

                    @if (count($conversations) > 0)
                        @foreach ($conversations as $conversation)
                            <button class="nav-link active mb-2" id="v-pills-user1-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-user1" type="button" role="tab"
                                aria-controls="v-pills-user1" aria-selected="true">

                                <div class="d-flex " wire:key='{{ $conversation->id }}'
                                    wire:click="$emit('ChatUserCelected',{{ $conversation }},{{ $this->getChatUserInstance($conversation, $name = 'id') }})">
                                    <img src="{{ asset('Attachments/user/' . $this->getChatUserInstance($conversation, $name = 'photo')) }}"
                                        width="60px" height="60px" style="border-radius: 50%">
                                    <div class="mx-2 w-100">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="my-name text-end">
                                                {{ $this->getChatUserInstance($conversation, $name = 'firstName') }}
                                                {{ $this->getChatUserInstance($conversation, $name = 'lastName') }}</h6>
                                            <span class="date" style="color:blue">منذ
                                                {{ $conversation->messages->last()?->created_at->shortAbsoluteDiffForHumans() }}</span>
                                        </div>

                                        <p class="view-message text-dark mb-0">
                                            {{ $conversation->messages->last()->body }}</p>
                                        <div class="unread_count"
                                            style="color:red;background-color: #c9c7c5;width: 20%; border-radius: 25px; float:left">
                                            56
                                        </div>

                                    </div>
                                </div>

                            </button>
                        @endforeach
                    @else
                        you have no conversation
                    @endif


                </div>

            </div>

        </div>

    </div>
</div>
