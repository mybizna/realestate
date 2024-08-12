<?php

namespace Modules\Realestate\Filament\Resources\TenancyServiceResource\Pages;

use Modules\Realestate\Filament\Resources\TenancyServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTenancyServices extends ListRecords
{
    protected static string $resource = TenancyServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
