<?php

namespace Modules\Realestate\Filament\Resources\ReadingGasResource\Pages;

use Modules\Realestate\Filament\Resources\ReadingGasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReadingGas extends EditRecord
{
    protected static string $resource = ReadingGasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
