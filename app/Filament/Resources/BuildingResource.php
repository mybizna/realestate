<?php

namespace Modules\Realestate\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Base\Filament\Resources\BaseResource;
use Modules\Realestate\Models\Building;

class BuildingResource extends BaseResource
{
    protected static ?string $model = Building::class;

    protected static ?string $slug = 'realestate/building';

    protected static ?string $navigationGroup = 'Realestate';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('slug')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('estate_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('type'),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('units')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('default_deposit')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('default_goodwill')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('default_amount')
                    ->numeric()
                    ->default(null),
                Forms\Components\Toggle::make('is_full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('estate_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('units')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('default_deposit')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('default_goodwill')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('default_amount')
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

}
