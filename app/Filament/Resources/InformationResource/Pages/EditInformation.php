<?php

namespace App\Filament\Resources\InformationResource\Pages;

use App\Filament\Resources\InformationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInformation extends EditRecord
{
    protected static string $resource = InformationResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getActions(): array
    {
        return [
                // Actions\DeleteAction::make()
            ];
    }
}
