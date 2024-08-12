<?php

namespace Modules\Realestate\Filament\Resources\ReadingWateResource\Pages;

use Modules\Realestate\Filament\Resources\ReadingWateResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReadingWates extends ListRecords
{
    protected static string $resource = ReadingWateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
