<?php

namespace Modules\Realestate\Filament\Resources\UnitSetupResource\Pages;

use Modules\Realestate\Filament\Resources\UnitSetupResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUnitSetups extends ListRecords
{
    protected static string $resource = UnitSetupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
