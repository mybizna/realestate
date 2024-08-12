<?php

namespace Modules\Realestate\Filament\Resources\ReadingGasResource\Pages;

use Modules\Realestate\Filament\Resources\ReadingGasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReadingGases extends ListRecords
{
    protected static string $resource = ReadingGasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
