<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdminResource\Pages;
use App\Filament\Resources\AdminResource\RelationManagers;
use App\Models\Admin;
use App\Models\Store;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class AdminResource extends Resource
{
    protected static ?string $model = Admin::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make([
                    Fieldset::make('Details')->schema([
                        TextInput::make('name')
                            ->rules(['required', 'string', 'max:255']),
                        TextInput::make('username')
                            ->unique(ignoreRecord: true)
                            ->rules([
                                'required',
                                'string',
                                'max:255',
                            ]),
                        TextInput::make('phone_number')
                            ->tel()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->rules(['required', 'numeric']),
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->rules(['required', 'email', 'max:255'])
                            ->maxLength(255),

                        TextInput::make('password')
                            ->password()
                            ->required()
                            ->rules(['required'])
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Select::make('store_id')
                            ->options(Store::all()->pluck('name', 'id'))
                            ->rules(['nullable', 'numeric', 'exists:stores,id']),
                    ]),

                ]),


                Group::make([
                    Fieldset::make('Status')->schema([
                        Radio::make('status')
                            ->label('')
                            ->options(['active' => 'Active', 'archived' => 'Archived'])
                            ->required()
                            ->inline(),
                    ]),
                    Fieldset::make('Super Admin')->schema([
                        Toggle::make('super_admin')
                            ->label('')
                            ->required(),
                    ]),
                    Fieldset::make('roles')->schema([
                        Select::make('roles')
                            ->multiple()
                            ->relationship('roles', 'name')
                            ->preload(),
                        // Select::make('permissions')
                        //     ->multiple()
                        //     ->relationship('permissions', 'name')
                        //     ->preload(),
                    ]),

                ]),









            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),

                TextColumn::make('store.name')
                    ->label('Store')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('username')
                    ->searchable(),

                TextColumn::make('email')
                    ->searchable(),

                TextColumn::make('phone_number')
                    ->searchable(),

                IconColumn::make('super_admin')
                    ->boolean(),

                TextColumn::make('status'),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListAdmins::route('/'),
            'create' => Pages\CreateAdmin::route('/create'),
            'edit' => Pages\EditAdmin::route('/{record}/edit'),
        ];
    }
}
