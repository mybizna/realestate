<?php

namespace Modules\Realestate\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Realestate\Models\ReadingWater;

class ReadingWaterResource extends BaseResource
{
    protected static ?string $model = ReadingWater::class;

    protected static ?string $slug = 'realestate/reading/water';

    protected static ?string $navigationGroup = 'Realestate';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
}
