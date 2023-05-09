<?php

namespace App\Http\Livewire\Secretary;

use Livewire\Component;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use App\Models\LawyerAppointment;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use App\Models\Lawyer;
use Filament\Tables\Actions\Action;
use WireUi\Traits\Actions;

class RequestAppointment extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    use Actions;

    protected function getTableQuery(): Builder
    {
        return LawyerAppointment::query()->where('is_accepted', 0);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('lawyer.id')
                ->label('LAWYER')
                ->formatStateUsing(function ($record) {
                    return $record->lawyer->firstname .
                        ' ' .
                        $record->lawyer->lastname;
                }),
            TextColumn::make('user.name')
                ->label('CLIENT NAME')
                ->searchable()
                ->sortable(),
            TextColumn::make('start_date')
                ->dateTime('F d, Y h:i A')
                ->label('START DATE'),
            TextColumn::make('end_date')
                ->dateTime('F d, Y h:i A')
                ->label('END DATE'),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            SelectFilter::make('lawyer_id')
                ->label('Select Lawyer')
                ->options(
                    Lawyer::pluck('id', 'id')->map(function ($query) {
                        $name = Lawyer::where('id', $query)->first();
                        return $name->firstname . ' ' . $name->lastname;
                    })
                ),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\ActionGroup::make([
                Tables\Actions\Action::make('Accept')
                    ->label('ACCEPT')
                    ->icon('heroicon-o-thumb-up')
                    ->color('success')
                    ->action(function ($record) {
                        $client_name =
                            $record->user->user_information->firstname .
                            ' ' .
                            $record->user->user_information->lastname;

                        $client_number =
                            $record->user->user_information->contact;
                        $record->update([
                            'is_accepted' => 1,
                        ]);
                        $api_key = '1aaad08e0678a1c60ce55ad2000be5bd';
                        $sender = 'SEMAPHORE';
                        $ch = curl_init();
                        $parameters = [
                            'apikey' => $api_key,
                            'number' => $client_number,
                            'message' =>
                                // 'E-LOIS \n Good day! This is to inform you that your document is ready for pick up. \n Thank you!',
                                'E-LOIS' .
                                "\n" .
                                'Good day ' .
                                $client_name .
                                '! This is to inform you that your requested appointment has been approved. For other information, do visit our office.' .
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

                        $this->dialog()->success(
                            $title = 'Request approved',
                            $description =
                                $client_name . ' request has been approved.'
                        );

                        return $output;
                    }),
                Tables\Actions\Action::make('Reject')
                    ->label('REJECT')
                    ->icon('heroicon-o-thumb-down')
                    ->color('danger')
                    ->action(function ($record) {
                        $client_name =
                            $record->user->user_information->firstname .
                            ' ' .
                            $record->user->user_information->lastname;

                        $client_number =
                            $record->user->user_information->contact;
                        $record->update([
                            'is_accepted' => 2,
                        ]);
                        $api_key = '1aaad08e0678a1c60ce55ad2000be5bd';
                        $sender = 'SEMAPHORE';
                        $ch = curl_init();
                        $parameters = [
                            'apikey' => $api_key,
                            'number' => $client_number,
                            'message' =>
                                // 'E-LOIS \n Good day! This is to inform you that your document is ready for pick up. \n Thank you!',
                                'E-LOIS' .
                                "\n" .
                                'Good day ' .
                                $client_name .
                                '! This is to inform you that your requested appointment has been rejected. For other information, do visit our office.' .
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

                        $this->dialog()->success(
                            $title = 'Request Rejected',
                            $description =
                                $client_name . ' request has been rejected.'
                        );

                        return $output;
                    }),
            ]),
        ];
    }

    

    public function render()
    {
        return view('livewire.secretary.request-appointment');
    }
}
