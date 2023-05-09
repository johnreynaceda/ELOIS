<?php

namespace App\Filament\Resources\DocumentTypeResource\Pages;

use App\Filament\Resources\DocumentTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDocumentTypes extends ListRecords
{
    protected static string $resource = DocumentTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('New Type')
                ->icon('heroicon-o-plus'),
        ];
    }
}
