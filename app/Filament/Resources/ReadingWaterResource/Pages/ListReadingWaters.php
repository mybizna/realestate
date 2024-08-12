<?php

namespace Modules\Realestate\Filament\Resources\ReadingWaterResource\Pages;

use Modules\Realestate\Filament\Resources\ReadingWaterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReadingWaters extends ListRecords
{
    protected static string $resource = ReadingWaterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
