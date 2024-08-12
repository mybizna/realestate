<?php

namespace Modules\Realestate\Filament\Resources\TenancyInvoiceResource\Pages;

use Modules\Realestate\Filament\Resources\TenancyInvoiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTenancyInvoices extends ListRecords
{
    protected static string $resource = TenancyInvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
