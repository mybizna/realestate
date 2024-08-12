<?php

namespace Modules\Realestate\Filament\Resources\ReadingElectricityResource\Pages;

use Modules\Realestate\Filament\Resources\ReadingElectricityResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReadingElectricity extends EditRecord
{
    protected static string $resource = ReadingElectricityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
