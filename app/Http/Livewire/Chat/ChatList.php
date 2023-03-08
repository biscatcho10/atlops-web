<?php

namespace App\Http\Livewire\Chat;

use App\Models\Conversation;
use App\Models\User;
use Livewire\Component;

class ChatList extends Component
{


    public $auth_id;
    public $conversations;
    public $receiverInstance;
    public $name;
    public $selectedConversation;

    protected $listeners = ['ChatUserCelected','refresh'=>'$refresh'];

    //click on conversation
    public function ChatUserCelected(Conversation $conversation, $receiverId)
    {

        // dd($conversation, $receiverId);
        $this->selectedConversation = $conversation;
        $receiverInstance = User::find($receiverId);

        //make event
       // $this->emitTo('chat.send-message', 'updateSendMessage', $this->selectedConversation, $receiverInstance);
        $this->emitTo('chat.chatbox', 'loadConversation', $this->selectedConversation, $receiverInstance);

        
    }

    //get user info
    public function getChatUserInstance(Conversation $conversation, $request)
    {
        $this->auth_id = auth()->id();
        if ($conversation->sender_id == $this->auth_id) {
            $this->receiverInstance = User::firstWhere('id', $conversation->receiver_id);
        } else {
            $this->receiverInstance = User::firstWhere('id', $conversation->sender_id);
        }

        if (isset($request)) {
            return $this->receiverInstance->$request;
        }
    }

    public function getChatAuthUser($request)
    {
        $this->auth_id = auth()->id();
        $this->receiverInstance = User::firstWhere('id', $this->auth_id);

        if (isset($request)) {
            return $this->receiverInstance->$request;
        }
    }

    public function mount()
    {
        $this->auth_id = auth()->id();
        $this->conversations = Conversation::where('sender_id', $this->auth_id)->orWhere('receiver_id', $this->auth_id)->orderBy('last_time_message', 'DESC')->get();
    }

    public function render()
    {
        return view('livewire.chat.chat-list');
    }
}
