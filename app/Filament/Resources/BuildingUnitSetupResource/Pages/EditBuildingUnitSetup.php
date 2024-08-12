<?php

namespace Modules\Realestate\Filament\Resources\BuildingUnitSetupResource\Pages;

use Modules\Realestate\Filament\Resources\BuildingUnitSetupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBuildingUnitSetup extends EditRecord
{
    protected static string $resource = BuildingUnitSetupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
