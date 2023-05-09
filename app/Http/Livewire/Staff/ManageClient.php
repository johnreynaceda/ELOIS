<?php

namespace App\Http\Livewire\Staff;

use Livewire\Component;
use App\Models\UserInformation;
use App\Models\RequestTransaction;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
use App\Models\DeedOfSale;

class ManageClient extends Component
{
    use Actions;
    use WithPagination;
    public $client_id;
    public $request_count;
    public $print_request = false;

     public $vendor_name, $vendor_address, $vendee_name, $vendee_address,$amount, $make, $mv_file_no, $engine_no,
     $classification, $type_of_body, $color, $chassis_no, $plate, $document_number, $page_number, $book_number,
     $series_of;

    public function mount()
    {
        $this->client_id = request()->id;
        $this->request_count = RequestTransaction::where(
            'user_id',
            $this->client_id
        )->count();
    }
    public function render()
    {
        return view('livewire.staff.manage-client', [
            'client_details' => UserInformation::where(
                'user_id',
                $this->client_id
            )->first(),
            'client_requests' => RequestTransaction::where(
                'user_id',
                $this->client_id
            )->paginate(5),
        ]);
    }

    public function doneRequest($id)
    {
        $request = RequestTransaction::where('id', $id)->first();
        $request->update([
            'status' => 3,
        ]);

        $this->dialog()->success(
            $title = 'Request Done',
            $description = 'Request has been marked as done.'
        );
        $this->emit('requestApproved');
    }

    public function openPrint($id){
        $data = DeedOfSale::where('request_transaction_id', $id)->first();
        
        $this->vendor_name = $data->vendor_name;
        $this->vendor_address = $data->vendor_address;
        $this->vendee_name = $data->vendee_name;
        $this->vendee_address = $data->vendee_address;
        $this->amount = $data->amount;
        $this->make = $data->make;
        $this->mv_file_no = $data->mv_file_no;
        $this->engine_no = $data->engine_no;
        $this->classification = $data->classification;
        $this->type_of_body = $data->type_of_body;
        $this->color = $data->color;
        $this->chassis_no = $data->chassis_no;
        $this->plate = $data->plate;
        $this->document_number = $data->document_number;
        $this->page_number = $data->page_number;
        $this->book_number = $data->book_number;
        $this->series_of = $data->series_of;
        
        $this->print_request = true;
    }
}
