<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ContactUs;
use Livewire\WithPagination;

class Message extends Component
{
    use WithPagination;

    public $category = null;
    public $status = null;

    public function render()
    {
        $messagesQuery = ContactUs::query()
            ->withCount('media');

        if ($this->category) {
            $messagesQuery->where('category', '=', $this->category);
        }
        if ($this->status) {
            $messagesQuery->where('status', '=', $this->status);
        }

        $messages = $messagesQuery->latest('updated_at')->paginate(5);

        return view('livewire.messages', [
            'messages' => $messages
        ])->title(trans('general.messages_list'));
    }

}
