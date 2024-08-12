<?php

namespace Modules\Realestate\Filament\Resources\ReadingElectricityResource\Pages;

use Modules\Realestate\Filament\Resources\ReadingElectricityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReadingElectricities extends ListRecords
{
    protected static string $resource = ReadingElectricityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
