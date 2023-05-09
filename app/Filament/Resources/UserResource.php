<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use App\Models\Role;
use Filament\Forms\Components\DatePicker;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Manage';
    protected static ?int $navigationSort = 1;

    public static function getEloquentQuery(): Builder
    {
        return User::query()
            ->where('role_id', '!=', 3)
            ->where('role_id', '!=', 0);
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Fieldset::make('User Details')
                ->schema([
                    TextInput::make('email')->required(),
                    TextInput::make('password')
                        ->required()
                        ->password(),
                ])
                ->columns(2),

            Fieldset::make('Employee Information')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('firstname')->required(),
                        TextInput::make('middlename')->required(),
                        TextInput::make('lastname')->required(),
                        DatePicker::make('birthdate')->required(),
                        TextInput::make('address')->required(),
                        TextInput::make('contact')->required(),
                    ]),
                ])
                ->columns(1),
            Fieldset::make('Assign User to Role')
                ->schema([
                    Select::make('role_id')
                        ->label('Role')
                        ->options(Role::pluck('name', 'id')),
                ])
                ->columns(1),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('NAME')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')->label('EMAIL'),
                TextColumn::make('role.name')->label('ROLE'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->color('success'),
                Tables\Actions\DeleteAction::make(),
            ]);
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
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
