<?php

namespace Modules\Realestate\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Realestate\Models\Unit;

class UnitResource extends BaseResource
{
    protected static ?string $model = Unit::class;

    protected static ?string $slug = 'realestate/unit';

    protected static ?string $navigationGroup = 'Realestate';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
}
