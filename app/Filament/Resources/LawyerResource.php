<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LawyerResource\Pages;
use App\Filament\Resources\LawyerResource\RelationManagers;
use App\Models\Lawyer;
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
use Filament\Forms\Components\DatePicker;

class LawyerResource extends Resource
{
    protected static ?string $model = Lawyer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationGroup = 'Manage';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Fieldset::make("Lawyer's Information")
                ->schema([
                    TextInput::make('firstname')->required(),
                    TextInput::make('middlename'),
                    TextInput::make('lastname')->required(),
                    TextInput::make('email')
                        ->required()
                        ->email(),
                    DatePicker::make('birthdate')->required(),
                    TextInput::make('address')->required(),
                    TextInput::make('phone')->required(),
                ])
                ->columns(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('firstname')
                    ->label('FIRSTNAME')
                    ->formatStateUsing(function ($record) {
                        return $record->firstname .
                            ' ' .
                            $record->middlename[0] .
                            '. ' .
                            $record->lastname;
                    })
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->label('EMAIL')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('birthdate')
                    ->label('BIRTHDATE')
                    ->date()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('address')
                    ->label('ADDRESS')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('phone')
                    ->label('PHONE NUMBER')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([Tables\Actions\EditAction::make()->color('success')])
            ->bulkActions([]);
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
            'index' => Pages\ListLawyers::route('/'),
            'create' => Pages\CreateLawyer::route('/create'),
            'edit' => Pages\EditLawyer::route('/{record}/edit'),
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
