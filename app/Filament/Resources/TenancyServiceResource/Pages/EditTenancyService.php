<?php

namespace Modules\Realestate\Filament\Resources\TenancyServiceResource\Pages;

use Modules\Realestate\Filament\Resources\TenancyServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTenancyService extends EditRecord
{
    protected static string $resource = TenancyServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
