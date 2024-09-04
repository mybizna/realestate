<?php

namespace Modules\Realestate\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\Realestate\Filament\Resources\TenancyResource\Pages;
use Modules\Realestate\Models\Tenancy;

class TenancyResource extends Resource
{
    protected static ?string $model = Tenancy::class;

    protected static ?string $slug = 'realestate/tenancy';

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
                Forms\Components\TextInput::make('unit_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('partner_id')
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
                Forms\Components\DateTimePicker::make('billing_date'),
                Forms\Components\Toggle::make('is_merged_bill'),
                Forms\Components\Toggle::make('is_started'),
                Forms\Components\Toggle::make('is_closed'),
                Forms\Components\Toggle::make('bill_gas'),
                Forms\Components\Toggle::make('bill_water'),
                Forms\Components\Toggle::make('bill_electricity'),
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
                Tables\Columns\TextColumn::make('unit_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('partner_id')
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
                Tables\Columns\TextColumn::make('billing_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_merged_bill')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_started')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_closed')
                    ->boolean(),
                Tables\Columns\IconColumn::make('bill_gas')
                    ->boolean(),
                Tables\Columns\IconColumn::make('bill_water')
                    ->boolean(),
                Tables\Columns\IconColumn::make('bill_electricity')
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTenancies::route('/'),
            'create' => Pages\CreateTenancy::route('/create'),
            'edit' => Pages\EditTenancy::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
