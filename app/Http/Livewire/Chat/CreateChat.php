<?php

namespace App\Http\Livewire\Chat;

use App\Models\Comment;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Order;
use Livewire\Component;

class CreateChat extends Component
{
    public $user;
    public $message = 'hello how are you';

    public function checkconversation($reciverId)
    {
        //dd($reciverId);
        $checkedConversation = Conversation::where('receiver_id', auth()->user()->id)->where('sender_id', $reciverId)->orWhere('receiver_id', $reciverId)->where('sender_id', auth()->user()->id)->get();

        if (count($checkedConversation) == 0) {
            // dd('no conversation');
            $createdConversation = Conversation::create(['sender_id' => auth()->user()->id, 'receiver_id' => $reciverId, 'last_time_message' => now()]);

            // dd($createdConversation)
            $createdMessage = Message::create(['conversation_id' => $createdConversation->id, 'sender_id' => auth()->user()->id, 'receiver_id' => $reciverId, 'body' => $this->message]);

            $createdConversation->last_time_message = $createdMessage->created_at;
            $createdConversation->save();

            dd($createdMessage);
            dd('saved');
            
        } elseif (count($checkedConversation) >= 1) {
            dd('conversation exits');
        }
    }


    public function render()
    {
        $this->user;

        return view('livewire.chat.create-chat',);
    }
}
