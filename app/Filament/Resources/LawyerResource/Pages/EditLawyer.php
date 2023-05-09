<?php

namespace App\Filament\Resources\LawyerResource\Pages;

use App\Filament\Resources\LawyerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLawyer extends EditRecord
{
    protected static string $resource = LawyerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
