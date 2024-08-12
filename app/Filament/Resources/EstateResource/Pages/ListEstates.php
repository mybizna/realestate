<?php

namespace Modules\Realestate\Filament\Resources\EstateResource\Pages;

use Modules\Realestate\Filament\Resources\EstateResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEstates extends ListRecords
{
    protected static string $resource = EstateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
