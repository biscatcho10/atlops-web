<?php

namespace App\Http\Livewire\Chat;

use App\Events\MessageSent;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chatbox extends Component
{

    public $selectedConversation;
    public $receiverInstance;
    public $createdMessage;
    public $paginatevar = 10;
    public $messages;
    public $message_count;
    public $body;

    //protected $listeners = ['loadConversation', 'loadmore', 'dispatchMessageSent'];

    public function getListeners()
    {
        $auth_id = auth()->user()->id;
        
        return [
            "echo-private:chat.{$auth_id},new-message" => 'broadcastedMessageReceived',
            'loadConversation', 'loadmore', 'dispatchMessageSent',
        ];
    }

    public function broadcastedMessageReceived($event)
    {
        dd($event);
    }

    public function loadConversation(Conversation $conversation, User $receiver)
    {
        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiver;

        $this->message_count = Message::where('conversation_id', $this->selectedConversation->id)->count();

        $this->messages = Message::where('conversation_id', $this->selectedConversation->id)
            ->skip($this->message_count - $this->paginatevar)
            ->take($this->paginatevar)->get();

        // to make scroll down in the conversation when open the conversation    
        $this->dispatchBrowserEvent('chatSelected');
    }

    public function sendMessage()
    {
        // dd($this->body);
        if ($this->body == null) {
            return null;
        }

        $this->createdMessage = Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'sender_id' => auth()->id(),
            'receiver_id' => $this->receiverInstance->id,
            'body' => $this->body,
        ]);

        $this->selectedConversation->last_time_message = $this->createdMessage->created_at;
        $this->selectedConversation->save();

        //عشان اول مبعت الرساله تظهر علطول بدون عمل رفرش للصفحة
        $newMessage = Message::find($this->createdMessage->id);
        $this->messages->push($newMessage);

        // عشان اخلى المكان اللى ببعت منه الرساله يكون فاضى مفيش فيه اى كلام
        $this->reset('body');

        //refresh conversation list
        $this->emitTo('chat.chat-list', 'refresh');

        //To make scroll down when send message 
        $this->dispatchBrowserEvent('rowChatToBottom');

        $this->emitSelf('dispatchMessageSent');
    }

    public function dispatchMessageSent()
    {
        broadcast(new MessageSent(Auth::user(), $this->createdMessage, $this->selectedConversation, $this->receiverInstance));
    }

    //To make load more message when scroll top in conversation 
    public function loadmore()
    {
        //dd('top reached');
        $this->paginatevar = $this->paginatevar + 5;

        $this->message_count = Message::where('conversation_id', $this->selectedConversation->id)->count();

        $this->messages = Message::where('conversation_id', $this->selectedConversation->id)
            ->skip($this->message_count - $this->paginatevar)
            ->take($this->paginatevar)->get();
    }

    public function render()
    {
        return view('livewire.chat.chatbox');
    }
}
