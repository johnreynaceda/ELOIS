<?php

namespace App\Http\Livewire\Staff;

use Livewire\Component;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Columns\TextColumn;
use DB;
use WireUi\Traits\Actions;
use App\Models\UserInformation;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ViewColumn;

class ClientTransaction extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    use Actions;

    public $add_modal = false;
    public $firstname, $middlename, $lastname, $birthdate, $address, $contact;

    protected function getTableQuery(): Builder
    {
        return User::query()
            ->where('role_id', 3)
            ->has('user_information');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('user_information.firstname')
                ->label('FIRSTNAME')
                ->searchable()
                ->sortable(),
            TextColumn::make('user_information.middlename')
                ->label('MIDDLENAME')
                ->searchable()
                ->sortable(),
            TextColumn::make('user_information.lastname')
                ->label('LASTNAME')
                ->searchable()
                ->sortable(),
            TextColumn::make('user_information.contact')
                ->label('CONTACT')
                ->searchable()
                ->sortable(),
            TextColumn::make('user_information.birthdate')
                ->label('BIRTHDATE')
                ->date()
                ->searchable()
                ->sortable(),

            ViewColumn::make('id')
                ->label('')
                ->view('staff.custom-filament.view-action'),
        ];
    }

    public function render()
    {
        return view('livewire.staff.client-transaction');
    }

    public function addClient()
    {
        $this->validate([
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'birthdate' => 'required',
            'address' => 'required',
            'contact' => 'required',
        ]);

        DB::beginTransaction();

        $user = User::create([
            'name' => $this->firstname . ' ' . $this->lastname,
            'email' =>
                $this->firstname . '' . $this->lastname . '' . '@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 3,
        ]);
        $user_info = UserInformation::create([
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'birthdate' => $this->birthdate,
            'address' => $this->address,
            'user_id' => $user->id,
            'contact' => $this->contact,
        ]);

        $this->notification()->success(
            $title = 'Client Created',
            $description = 'Client has been created successfully'
        );
        DB::commit();
        $this->add_modal = false;
    }
}
