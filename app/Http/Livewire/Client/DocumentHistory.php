<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\RequestTransaction;

class DocumentHistory extends Component
{
    protected $listeners = ['notarized' => 'render'];

    public function render()
    {
        return view('livewire.client.document-history', [
            'request_transactions' => RequestTransaction::where(
                'user_id',
                auth()->user()->id
            )->get(),
        ]);
    }
}
