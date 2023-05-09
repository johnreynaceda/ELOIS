<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\Lawyer;
use App\Models\LawyerAppointment;
use Carbon\Carbon;
use WireUi\Traits\Actions;

class AppointmentRequest extends Component
{
    use Actions;
    public $add_modal = false;
    public $lawyer_id, $name, $start_date, $start_time, $end_date, $end_time;
    public function render()
    {
        return view('livewire.client.appointment-request', [
            'lawyers' => Lawyer::get(),
        ]);
    }

    public function updatedAddModal()
    {
        if (auth()->user()->user_information == null) {
            $this->dialog()->info(
                $title = 'Information Required',
                $description = 'Please update your information first.'
            );
            $this->add_modal = false;
        }
    }

    public function sendRequest()
    {
        $this->validate([
            'lawyer_id' => 'required',
            'name' => 'required',
            'start_date' => 'required',
            'start_time' => 'required',
            'end_date' => 'required',
            'end_time' => 'required',
        ]);

        LawyerAppointment::create([
            'lawyer_id' => $this->lawyer_id,
            'user_id' => auth()->user()->id,
            'name' => $this->name,
            'start_date' => Carbon::parse(
                $this->start_date . '' . $this->start_time
            )->format('Y-m-d\TH:i:s'),
            'end_date' => Carbon::parse(
                $this->end_date . '' . $this->end_time
            )->format('Y-m-d\TH:i:s'),
        ]);
        $this->add_modal = false;
        $this->dialog()->success(
            $title = 'Request Sent',
            $description = 'Your request has been sent'
        );
    }
}
