<?php

namespace App\Http\Livewire\Staff;

use Livewire\Component;
use App\Models\RequestTransaction;
use App\Models\User;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Columns\Layout\Split;
// use Filament\Tables\Columns\Layout\View;
use Filament\Tables\Columns\ImageColumn;
use WireUi\Traits\Actions;

class Requests extends Component implements Tables\Contracts\HasTable
{
    use Actions;
    use Tables\Concerns\InteractsWithTable;
    public $validate_modal = false;
    public $infos;
    public $reject_modal = false;
    public $request_id;
    public $remarks;

    protected function getTableQuery(): Builder
    {
        return RequestTransaction::query()->where('status', 1);
    }

    public function render()
    {
        return view('livewire.staff.requests');
    }

    protected function getTableColumns(): array
    {
        return [
            ViewColumn::make('aaa')
                ->view('staff.request-column')
                ->label(''),
            TextColumn::make('id')
                ->label('FULLNAME')
                ->formatStateUsing(function ($record) {
                    return $record->user->user_information->firstname .
                        ' ' .
                        $record->user->user_information->middlename[0] .
                        '. ' .
                        $record->user->user_information->lastname;
                })
                ->searchable()
                ->sortable(),
            TextColumn::make('address')
                ->label('ADDRESS')
                ->searchable()
                ->sortable(),
            TextColumn::make('birthdate')
                ->label('BIRTHDATE')
                ->date()
                ->searchable()
                ->sortable(),
            BadgeColumn::make('status')
                ->label('STATUS')
                ->enum([
                    1 => 'Pending',
                    2 => 'Onqueue',
                ])
                ->colors([
                    'warning' => 1,
                    'success' => 2,
                ]),
            ViewColumn::make('aaad')
                ->view('staff.dropdown-column')
                ->label(''),
        ];
    }

    public function validateRequest($id)
    {
        $request = RequestTransaction::where('id', $id)
            ->with('user')
            ->first();
        $this->infos = $request;
        $this->validate_modal = true;
    }
    public function openRejectModal($id){
        $this->request_id = $id;
        $this->reject_modal = true;
    }

    public function approveRequest($id)
    {
        $transaction = RequestTransaction::where('id', $id)->first();
        $client_name =
            $transaction->user->user_information->firstname .
            ' ' .
            $transaction->user->user_information->lastname;

        $transaction->update([
            'status' => 2,
        ]);

        $api_key = '1aaad08e0678a1c60ce55ad2000be5bd';
        $sender = 'SEMAPHORE';
        $ch = curl_init();
        $parameters = [
            'apikey' => $api_key,
            'number' => $transaction->user->user_information->contact,
            'message' =>
                // 'E-LOIS \n Good day! This is to inform you that your document is ready for pick up. \n Thank you!',
                'E-LOIS' .
                "\n" .
                'Good day ' .
                $client_name .
                '! This is to inform you that your request has been approved. For other information, do visit our office.' .
                "\n" .
                'Thank you!',
            'sendername' => $sender,
        ];
        curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);

        $this->dialog()->success(
            $title = 'Request approved',
            $description = $client_name . ' request has been approved.'
        );

        return $output;
    }

    public function rejectRequest()
    {
        $transaction = RequestTransaction::where('id', $this->request_id)->first();
        $client_name =
            $transaction->user->user_information->firstname .
            ' ' .
            $transaction->user->user_information->lastname;
        $api_key = '1aaad08e0678a1c60ce55ad2000be5bd';
        $sender = 'SEMAPHORE';
        $ch = curl_init();
        $parameters = [
            'apikey' => $api_key,
            'number' => $transaction->user->user_information->contact,
            'message' =>
                // 'E-LOIS \n Good day! This is to inform you that your document is ready for pick up. \n Thank you!',
                'E-LOIS' .
                "\n" .
                'Good day ' .
                $client_name .
                '! This is to inform you that your request has been rejected because the lawyer is not available. For other information, do visit our office or make another request.' .
                "\n" .
                'Thank you!' . "\n" . 'Reason: ' . $this->remarks,
            'sendername' => $sender,
        ];
        curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        $transaction->update([
            'status' => 3,
            'remarks' => $this->remarks,
        ]);
        $this->dialog()->success(
            $title = 'Request Rejected',
            $description =
                $transaction->user->name . ' request has been rejected.'
        );
        $this->reject_modal = false;
        $this->emit('requestApproved');
        return $output;
    }

    public function smsSend(){
    $api_key = '1aaad08e0678a1c60ce55ad2000be5bd';
    $sender = 'SEMAPHORE';
    $ch = curl_init();
    $parameters = [
    'apikey' => $api_key,
    'number' => '09489203090',
    'message' =>
    // 'E-LOIS \n Good day! This is to inform you that your document is ready for pick up. \n Thank you!',
    'E-LOIS' .
    "\n" .
    'Good day ' .
    'REY' .
    '! This is to inform you that your requested appointment has been rejected. For other information, do visit our
    office.' .
    "\n" .
    'Thank you!',
    'sendername' => $sender,
    ];
    curl_setopt(
    $ch,
    CURLOPT_URL,
    'https://semaphore.co/api/v4/messages'
    );
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt(
    $ch,
    CURLOPT_POSTFIELDS,
    http_build_query($parameters)
    );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    }
}
