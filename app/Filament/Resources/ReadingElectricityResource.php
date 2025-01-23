<?php

namespace Modules\Realestate\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Realestate\Models\ReadingElectricity;

class ReadingElectricityResource extends BaseResource
{
    protected static ?string $model = ReadingElectricity::class;

    protected static ?string $slug = 'realestate/reading/electricity';

    protected static ?string $navigationGroup = 'Realestate';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
}
