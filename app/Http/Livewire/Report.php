<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\RequestTransaction;
use App\Models\LawyerAppointment;

class Report extends Component
{
    public $print_get;
    public $datefrom;
    public $dateto;
    public $print_modal = false;
    public function render()
    {
        return view('livewire.report', [
            'requests' => RequestTransaction::where('status', '3')
                ->when($this->datefrom, function ($query) {
                    $query->where('created_at', '>=', $this->datefrom);
                })
                ->when($this->dateto, function ($query) {
                    $query->where('created_at', '<=', $this->dateto);
                })
                ->get(),
            'appointments' => LawyerAppointment::where('is_accepted', true)
                ->when($this->datefrom, function ($query) {
                    $query->where('created_at', '>=', $this->datefrom);
                })
                ->when($this->dateto, function ($query) {
                    $query->where('created_at', '<=', $this->dateto);
                })
                ->get(),
        ]);
    }

    public function printPreview($id)
    {
        $this->print_get = $id;
        $this->print_modal = true;
    }
}
