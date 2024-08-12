<?php

namespace Modules\Realestate\Filament\Resources\BuildingUnitSetupResource\Pages;

use Modules\Realestate\Filament\Resources\BuildingUnitSetupResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBuildingUnitSetups extends ListRecords
{
    protected static string $resource = BuildingUnitSetupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
