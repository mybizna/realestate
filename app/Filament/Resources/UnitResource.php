<?php

namespace Modules\Realestate\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Base\Filament\Resources\BaseResource;
use Modules\Realestate\Filament\Resources\UnitResource\Pages;
use Modules\Realestate\Models\Unit;

class UnitResource extends BaseResource
{
    protected static ?string $model = Unit::class;

    protected static ?string $slug = 'realestate/unit';

    protected static ?string $navigationGroup = 'Realestate';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('building_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('type')
                    ->required(),
                Forms\Components\TextInput::make('amount')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('deposit')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('goodwill')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('rooms')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('bathrooms')
                    ->required()
                    ->numeric(),
                Forms\Components\Toggle::make('is_full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('building_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deposit')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('goodwill')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rooms')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bathrooms')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_full')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {

        return [
            'index' => Pages\Listing::route('/'),
            'create' => Pages\Creating::route('/create'),
            'edit' => Pages\Editing::route('/{record}/edit'),
        ];
    }
}
