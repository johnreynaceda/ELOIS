<?php

namespace App\Http\Livewire\Secretary;

use Livewire\Component;
use App\Models\Event;
use Carbon\Carbon;
use DB;
use WireUi\Traits\Actions;
class Calendar extends Component
{
    use Actions;
    public $add_modal = false;
    public $title, $description, $start_date, $start_time, $end_date, $end_time;

    public $events = [];

    protected $listeners = ['deleteEvent' => 'deleteEvent'];

    public function mount()
    {
        $this->events = $this->getFormattedEvents();
    }

    public function render()
    {
        return view('livewire.secretary.calendar');
    }

    public function getFormattedEvents()
    {
        $events = Event::all();

        $formattedEvents = [];
        foreach ($events as $event) {
            $startDateTime = date('Y-m-d H:i', strtotime($event->start));
            $endDateTime = date('Y-m-d H:i', strtotime($event->end));
            $formattedEvents[] = [
                'title' =>
                    $event->title .
                    ' - ' .
                    Carbon::parse($startDateTime)->format('g:i A') .
                    ' - ' .
                    Carbon::parse($endDateTime)->format('g:i A'),

                'start' => $startDateTime,
                'end' => $endDateTime,
                'name' => $event->title,
                'description' => $event->description,
                'other' =>
                    Carbon::parse($startDateTime)->format('g:i A') .
                    ' - ' .
                    Carbon::parse($endDateTime)->format('g:i A'),
                'event_id' => $event->id,
            ];
        }
        return $formattedEvents;
    }

    public function addEvent()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'start_time' => 'required',
            'end_date' => 'required',
            'end_time' => 'required',
        ]);
        DB::beginTransaction();
        $event = Event::create([
            'title' => $this->title,
            'description' => $this->description,
            'start' => Carbon::parse(
                $this->start_date . '' . $this->start_time
            )->format('Y-m-d\TH:i:s'),
            'end' => Carbon::parse(
                $this->end_date . '' . $this->end_time
            )->format('Y-m-d\TH:i:s'),
        ]);
        DB::commit();
        $this->add_modal = false;
        $this->dialog()->success(
            $title = 'Event Added',
            $description = 'Your event has been added'
        );
        $this->reset(
            'title',
            'description',
            'start_date',
            'start_time',
            'end_date',
            'end_time'
        );
        return redirect()->route('secretary.calendar');
    }

    public function deleteEvent($id)
    {
        Event::where('id', $id)->delete();
        $this->dialog()->success(
            $title = 'Event Deleted',
            $description = 'Your event has been deleted'
        );

        return redirect()->route('secretary.calendar');
    }
}
