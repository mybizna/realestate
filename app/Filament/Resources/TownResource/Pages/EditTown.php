<?php

namespace Modules\Realestate\Filament\Resources\TownResource\Pages;

use Modules\Realestate\Filament\Resources\TownResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTown extends EditRecord
{
    protected static string $resource = TownResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
