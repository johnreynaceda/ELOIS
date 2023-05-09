<?php

namespace App\Http\Livewire\Staff;

use Livewire\Component;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use App\Models\NotarizeDocument as documentModel;
use DB;
use Illuminate\Support\Facades\Storage;

class NotarizeDocument extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    public $upload_modal = false;
    public $name;
    public $attachment;
    public $user_id;

    public function mount(): void
    {
        $this->user_id = request()->id;
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')->required(),
            FileUpload::make('attachment')
                ->required()

                ->disk('notarize_documents'),
        ];
    }

    public function save()
    {
        $this->validate();
        DB::beginTransaction();
        foreach ($this->attachment as $item) {
            $docs = documentModel::create([
                'name' => $this->name,
                'user_id' => $this->user_id,
                'file_path' => $item->storeAs(
                    'notarize_documents',
                    $item->getClientOriginalName()
                ),
            ]);
        }

        DB::commit();
        $this->reset('name', 'attachment');
        $this->upload_modal = false;
    }

    public function render()
    {
        return view('livewire.staff.notarize-document', [
            'documents' => documentModel::where(
                'user_id',
                $this->user_id
            )->get(),
        ]);
    }

    public function fileDownload($id)
    {
        $file = documentModel::where('id', $id)->first();

        return Storage::download($file->file_path);
    }
}
