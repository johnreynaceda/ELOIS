<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\RequestTransaction;
use DB;
use App\Models\DeedOfSale;

class RequestDocument extends Component 
{
    use Actions;
    public $request_modal = false;

    public $firstname, $lastname, $middlename, $birthdate, $address, $notes;
    public $category;

    public $vendor_name, $vendor_address, $vendee_name, $vendee_address,$amount, $make, $mv_file_no, $engine_no, $classification, $type_of_body, $color, $chassis_no, $plate, $document_number, $page_number, $book_number, $series_of;
    public function render()
    {
        return view('livewire.client.request-document');
    }

  

    public function updatedCategory(){
      if ($this->category == 1) {
          $this->request_modal = true;
      }else{
        $this->dialog()->info(
            $title = 'Sorry',
            $description = 'This document is not available yet.'
        );
      }
    }

    public function updatedRequestModal()
    {
        if (auth()->user()->user_information == null) {
            $this->dialog()->info(
                $title = 'Information Required',
                $description = 'Please update your information first.'
            );
            $this->request_modal = false;
        }
    }

    public function sendRequest()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'middlename' => 'required',
            'birthdate' => 'required',
            'address' => 'required',
            'notes' => 'required',
        ]);
        DB::beginTransaction();
        $request = RequestTransaction::create([
            'user_id' => auth()->user()->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'middlename' => $this->middlename,
            'birthdate' => $this->birthdate,
            'address' => $this->address,
            'notes' => $this->notes,
            'category' => $this->category,
        ]);

        DeedOfSale::create([
            'request_transaction_id' => $request->id,
            'user_id' => auth()->user()->id,
            'vendor_name' => $this->vendor_name,
            'vendor_address' => $this->vendor_address,
            'vendee_name' => $this->vendee_name,
            'vendee_address' => $this->vendee_address,
            'amount' => $this->amount,
            'make' => $this->make,
            'mv_file_no' => $this->mv_file_no,
            'engine_no' => $this->engine_no,
            'classification' => $this->classification,
            'type_of_body' => $this->type_of_body,
            'color' => $this->color,
            'chassis_no' => $this->chassis_no,
            'plate' => $this->plate,
            'document_number' => $this->document_number,
            'page_number' => $this->page_number,
            'book_number' => $this->book_number,
            'series_of' => $this->series_of,
        ]);

        DB::commit();
        $this->dialog()->success(
            $title = 'Request Sent',
            $description =
                'Your request has been sent. Please wait for the approval of the Office Staff.'
        );
        $this->request_modal = false;

        $this->emit('notarized');
        return redirect()->route('client.dashboard');
    }
}
