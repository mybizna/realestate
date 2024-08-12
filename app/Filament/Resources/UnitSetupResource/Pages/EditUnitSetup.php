<?php

namespace Modules\Realestate\Filament\Resources\UnitSetupResource\Pages;

use Modules\Realestate\Filament\Resources\UnitSetupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUnitSetup extends EditRecord
{
    protected static string $resource = UnitSetupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
