<?php

namespace App\Http\Livewire\Staff;

use Livewire\Component;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use App\Models\CasesDocument;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Columns\TextColumn;
use DB;
use WireUi\Traits\Actions;
use App\Models\UserInformation;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ViewColumn;
use App\Models\CasesFolder;
use Filament\Forms\Components\FileUpload;
use App\Models\LawCasesAttachment;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Filters\SelectFilter;

class LawCases extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    use Actions;
    public $manage_directory = false;
    public $add_directory = false;
    public $directory_name;
    public $add_modal = false;

    public $name,
        $document_number,
        $page_number,
        $book_number,
        $series_number,
        $attachment;

    public $directory_id, $directoryName;

    public function mount(): void
    {
        $this->form->fill([]);
    }

    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('attachment')
                ->label('')
                ->storeFileNamesIn('attachment_file_names'),
            // ...
        ];
    }

    public function render()
    {
        return view('livewire.staff.law-cases', [
            'directories' => CasesFolder::all(),
        ]);
    }

    protected function getTableQuery(): Builder
    {
        return CasesDocument::query();
    }
    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')
                ->label('NAME')
                ->searchable()
                ->sortable(),
            TextColumn::make('document_number')
                ->label('DOCUMENT NO.')
                ->searchable()
                ->sortable(),
            TextColumn::make('page_number')
                ->label('PAGE NO.')
                ->searchable()
                ->sortable(),
            TextColumn::make('book_number')
                ->label('BOOK NO.')
                ->searchable()
                ->sortable(),
            TextColumn::make('series_number')
                ->label('SERIES NO.')
                ->searchable()
                ->sortable(),
            // TextColumn::make('lawCasesAttachments.path')
            //     ->label('PATH URL')
            //     ->color('success'),
            ViewColumn::make('path')
                ->view('staff.custom-filament.filepath')
                ->label('PATH URL'),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            SelectFilter::make('id')
                ->label('DIRECTORY')
                ->options(CasesFolder::all()->pluck('name', 'id')),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\ActionGroup::make([
                // Tables\Actions\EditAction::make()->color('success'),
                Tables\Actions\Action::make('download')
                    ->label('Download')
                    ->icon('heroicon-s-download')
                    ->action(function ($record) {
                        return Storage::download(
                            $record->LawCasesAttachments->first()->path
                        );
                        $this->dialog()->success(
                            $title = 'Success',
                            $description = 'Successfully downloaded'
                        );
                    }),
                Tables\Actions\DeleteAction::make(),
            ]),
        ];
    }

    public function saveDirectory()
    {
        $this->validate([
            'directory_name' => 'required',
        ]);

        DB::beginTransaction();
        CasesFolder::create([
            'name' => $this->directory_name,
        ]);
        DB::commit();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Directory created successfully'
        );
        $this->add_directory = false;
        $this->directory_name = '';
    }

    public function updatedDirectoryId()
    {
        $this->directoryName = CasesFolder::where(
            'id',
            $this->directory_id
        )->first()->name;

        $directory = CasesFolder::where('id', $this->directory_id)->first()
            ->name;

        $count =
            CasesDocument::where(
                'cases_folder_id',
                $this->directory_id
            )->count() + 1;
        $this->document_number =
            $directory[0] .
            '' .
            $directory[1] .
            '-' .
            \Carbon\Carbon::now()->format('mdy') .
            '' .
            $count;
    }

    public function saveDocument()
    {
        $this->validate([
            'name' => 'required',
            'page_number' => 'required',
            'book_number' => 'required|numeric',
            'series_number' => 'required|numeric',
            'attachment' => 'required',
            'directory_id' => 'required',
        ]);

        DB::beginTransaction();
        $document = CasesDocument::create([
            'name' => $this->name,
            'document_number' => $this->document_number,
            'page_number' => $this->page_number,
            'book_number' => $this->book_number,
            'series_number' => $this->series_number,
            'cases_folder_id' => $this->directory_id,
        ]);
        foreach ($this->attachment as $key => $value) {
            LawCasesAttachment::create([
                'cases_document_id' => $document->id,
                'path' => $value->storeAs(
                    $this->directoryName,
                    $value->getClientOriginalName()
                ),
            ]);
        }
        DB::commit();
        $this->add_modal = false;
        $this->dialog()->success(
            $title = 'Success',
            $description = 'Document created successfully'
        );
    }

    public function downloadFile($path)
    {
        $file = LawCasesAttachment::where('id', $path)->first();
        return Storage::download($file->path);
    }

    public function sendSms()
    {
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
                'Good day! This is to inform you that your document is ready for pick up.' .
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
        return $output;
    }
}
