<?php

namespace App\Http\Livewire\Secretary;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\DoctorsAppointment;
use App\Models\LawyerAppointment;

class Appointment extends Component
{
    public $date_today;
    public $create_modal = false;
    public $events = [];

    public $name, $start_date, $start_time, $end_date, $end_time;
    public $schedules;

    public function mount()
    {
        $this->events = $this->getFormattedEvents();
        $this->date_today = Carbon::now()->format('Y-m-d');
    }

    public function render()
    {
        return view('livewire.secretary.appointment');
    }

    public function add()
    {
        LawyerAppointment::create([
            'name' => $this->name,
            'start_date' => Carbon::parse(
                $this->start_date . '' . $this->start_time
            )->format('Y-m-d\TH:i:s'),
            'end_date' => Carbon::parse(
                $this->end_date . '' . $this->end_time
            )->format('Y-m-d\TH:i:s'),
        ]);
    }

    public function getFormattedEvents()
    {
        $events = LawyerAppointment::where('is_accepted', true)->get();

        $formattedEvents = [];
        foreach ($events as $event) {
            $startDateTime = date(
                'Y-m-d H:i',
                strtotime($event->start_date . ' ' . $event->start_time)
            );
            $endDateTime = date(
                'Y-m-d H:i',
                strtotime($event->end_date . ' ' . $event->end_time)
            );
            $formattedEvents[] = [
                'lawyer' =>
                    $event->lawyer->firstname . ' ' . $event->lawyer->lastname,
                'title' =>
                    $event->name .
                    ' - ' .
                    Carbon::parse($startDateTime)->format('g:i A') .
                    ' - ' .
                    Carbon::parse($endDateTime)->format('g:i A'),

                'start' => $startDateTime,
                'end' => $endDateTime,
                'name' => $event->name,
                'description' =>
                    Carbon::parse($startDateTime)->format('F d, Y h:i A') .
                    ' - ' .
                    Carbon::parse($endDateTime)->format('F d, Y h:i A'),
            ];
        }
        return $formattedEvents;
    }
}
