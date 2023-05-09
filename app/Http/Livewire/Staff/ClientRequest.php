<?php

namespace App\Http\Livewire\Staff;

use Livewire\Component;
use App\Models\RequestTransaction;

class ClientRequest extends Component
{
    protected $listeners = ['requestApproved' => 'render'];

    public function render()
    {
        return view('livewire.staff.client-request', [
            'requests' => RequestTransaction::where('status', 2)
                ->with(['user.user_information'])
                ->get(),
        ]);
    }
}
