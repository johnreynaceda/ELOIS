<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\UserInformation;
use WireUi\Traits\Actions;

class Profile extends Component
{
    use Actions;
    public $request_modal = false;
    public $firstname,
        $middlename,
        $lastname,
        $birthdate,
        $address,
        $user_id,
        $contact;
    public function render()
    {
        return view('livewire.client.profile');
    }

    public function updateInfo($id)
    {
        $this->user_id = $id;
        if (UserInformation::where('user_id', $id)->exists()) {
            $info = UserInformation::where('user_id', $id)->first();
            $this->firstname = $info->firstname;
            $this->middlename = $info->middlename;
            $this->lastname = $info->lastname;
            $this->birthdate = $info->birthdate;
            $this->address = $info->address;
            $this->contact = $info->contact;
            $this->request_modal = true;
        } else {
            $this->request_modal = true;
        }
    }

    public function saveInformation()
    {
        if (UserInformation::where('user_id', $this->user_id)->exists()) {
            auth()
                ->user()
                ->user_information->update([
                    'firstname' => $this->firstname,
                    'middlename' => $this->middlename,
                    'lastname' => $this->lastname,
                    'birthdate' => $this->birthdate,
                    'address' => $this->address,
                    'contact' => $this->contact,
                ]);
        } else {
            UserInformation::create([
                'firstname' => $this->firstname,
                'middlename' => $this->middlename,
                'lastname' => $this->lastname,
                'birthdate' => $this->birthdate,
                'address' => $this->address,
                'contact' => $this->contact,
                'user_id' => $this->user_id,
            ]);
        }
        $this->dialog()->success(
            $title = 'Success',
            $description = 'Information updated successfully.'
        );
        $this->request_modal = false;
    }
}
