<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\LawyerAppointment;

class AppointmentHistory extends Component
{
    public function render()
    {
        return view('livewire.client.appointment-history', [
            'lawyer_appointments' => LawyerAppointment::where(
                'user_id',
                auth()->user()->id
            )->get(),
        ]);
    }
}
