<?php

namespace Modules\Realestate\Filament\Resources\TenancyInvoiceResource\Pages;

use Modules\Realestate\Filament\Resources\TenancyInvoiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTenancyInvoice extends EditRecord
{
    protected static string $resource = TenancyInvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
