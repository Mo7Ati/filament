<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    public function form(Form $form): Form
    {

        return $form
            ->schema([
                Group::make([
                    Fieldset::make('Details')
                        ->schema([
                            TextInput::make('name')
                                ->rules(rules: ['required', 'string', 'max:255'])
                                ->live()
                                ->afterStateUpdated(fn($set, $state) => $set('slug', Str::slug($state))),

                            TextInput::make('slug')
                                ->maxLength(255),

                            RichEditor::make('description')
                                ->columnSpanFull(),

                            FileUpload::make('image')
                                ->image()
                                ->directory('products')
                                ->disk('public')
                                ->columnSpanFull(),
                        ]),
                ])->columnSpan(['lg' => 2]),

                Group::make([
                    Fieldset::make('status')
                        ->schema([
                            Radio::make('status')
                                ->label('')
                                ->options(['active' => 'Active', 'archived' => 'Archived'])
                                ->default(state: 'Active')
                                ->inline(),
                        ]),

                    Fieldset::make('Associations')->schema([
                        Select::make('store_id')
                            ->relationship('store', 'name')
                            ->label('Store')
                            ->rules(['required', 'numeric', 'exists:stores,id'])
                            ->columnSpanFull(),

                        Select::make('categories')
                            ->relationship('categories', 'name')
                            ->multiple()
                            ->columnSpanFull(),
                    ]),
                ])->columnSpan(['lg' => 1]),

                Group::make([
                    Fieldset::make('Pricing')
                        ->schema([
                            TextInput::make('price')
                                ->numeric()
                                // ->rules(['required', 'numeric', 'lt:compare_price'])
                                ->prefix('$'),

                            TextInput::make('compare_price')
                                ->numeric()
                                // ->rules(['nullable', 'numeric', 'gt:price'])
                                ->prefix('$'),
                        ])
                ])->columnSpan(['lg' => 2]),
            ])
            ->columns([
                'default' => 1,
                'lg' => 3,
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_url')
                    ->label('Image')
                    ->size(40),
                TextColumn::make('name')
                    ->searchable(),

                TextColumn::make('store.name')
                    ->sortable(),

                TextColumn::make('price')
                    ->money()
                    ->sortable(),
                TextColumn::make('compare_price')
                    ->numeric()
                    ->sortable(),

                IconColumn::make('status')
                    ->boolean(),

                TextColumn::make('quantity')
                    ->numeric()
                    ->sortable(),

                // TextColumn::make('rating')
                //     ->numeric()
                //     ->sortable(),
                // IconColumn::make('featured')
                //     ->boolean(),

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
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
