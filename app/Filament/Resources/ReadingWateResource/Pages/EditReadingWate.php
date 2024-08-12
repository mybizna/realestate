<?php

namespace Modules\Realestate\Filament\Resources\ReadingWateResource\Pages;

use Modules\Realestate\Filament\Resources\ReadingWateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReadingWate extends EditRecord
{
    protected static string $resource = ReadingWateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
