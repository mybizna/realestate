<?php

namespace Modules\Realestate\Filament\Resources\EstateResource\Pages;

use Modules\Realestate\Filament\Resources\EstateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEstate extends EditRecord
{
    protected static string $resource = EstateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
