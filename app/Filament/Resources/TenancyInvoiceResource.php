<?php

namespace Modules\Realestate\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Base\Filament\Resources\BaseResource;
use Modules\Realestate\Filament\Resources\TenancyInvoiceResource\Pages;
use Modules\Realestate\Models\TenancyInvoice;

class TenancyInvoiceResource extends BaseResource
{
    protected static ?string $model = TenancyInvoice::class;

    protected static ?string $slug = 'realestate/tenancy/invoice';

    protected static ?string $navigationGroup = 'Realestate';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tenancy_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('invoice_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('billing_period')
                    ->maxLength(20)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tenancy_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('invoice_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('billing_period')
                    ->searchable(),
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
