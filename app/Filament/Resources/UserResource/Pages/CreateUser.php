<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function handleRecordCreation(array $data): Model
    {
        $user = User::firstOrCreate([
            'name' =>
                $data['firstname'] .
                ' ' .
                $data['middlename'] .
                ' ' .
                $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => $data['role_id'],
        ]);

        $user->user_information()->create([
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'lastname' => $data['lastname'],
            'birthdate' => $data['birthdate'],
            'address' => $data['address'],
            'contact' => $data['contact'],
        ]);

        $user->refresh();
        return $user;
    }
}
