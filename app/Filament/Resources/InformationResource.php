<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InformationResource\Pages;
use App\Filament\Resources\InformationResource\RelationManagers;
use App\Models\UserInformation;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;

class InformationResource extends Resource
{
    protected static ?string $model = UserInformation::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';
    protected static ?string $navigationGroup = 'Employee';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Information';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Fieldset::make('Employee Information')
                ->schema([
                    TextInput::make('firstname')->required(),
                    TextInput::make('middlename')->required(),
                    TextInput::make('lastname')->required(),
                    TextInput::make('birthdate')->required(),
                    TextInput::make('address')->required(),
                    FileUpload::make('attachment'),
                ])
                ->columns(1),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('firstname')
                    ->label('FIRSTNAME')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('middlename')
                    ->label('MIDDLENAME')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('lastname')
                    ->label('LASTNAME')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('birthdate')
                    ->label('BIRTHDATE')
                    ->date('F d, Y')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('address')
                    ->label('ADDRESS')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([Tables\Actions\EditAction::make()->color('success')])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getRelations(): array
    {
        return [
                //
            ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInformation::route('/'),
            'create' => Pages\CreateInformation::route('/create'),
            'edit' => Pages\EditInformation::route('/{record}/edit'),
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static function getNavigationBadgeColor(): ?string
    {
        return 'success';
    }
}
