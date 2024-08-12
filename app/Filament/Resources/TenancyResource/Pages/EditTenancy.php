<?php

namespace Modules\Realestate\Filament\Resources\TenancyResource\Pages;

use Modules\Realestate\Filament\Resources\TenancyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTenancy extends EditRecord
{
    protected static string $resource = TenancyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
