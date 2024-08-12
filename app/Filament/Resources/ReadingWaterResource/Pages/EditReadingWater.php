<?php

namespace Modules\Realestate\Filament\Resources\ReadingWaterResource\Pages;

use Modules\Realestate\Filament\Resources\ReadingWaterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReadingWater extends EditRecord
{
    protected static string $resource = ReadingWaterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
