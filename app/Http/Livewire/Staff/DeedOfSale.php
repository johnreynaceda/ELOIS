<?php

namespace App\Http\Livewire\Staff;

use Livewire\Component;

class DeedOfSale extends Component
{
    public $print_modal=false;
    public $client_name;
    public $client_address;
    public $amount, $make, $model, $type, $serial_number, $motor_number, $plate_number, $file;
    public function render()
    {
        return view('livewire.staff.deed-of-sale');
    }
}
