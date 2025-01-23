<?php

namespace Modules\Realestate\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Realestate\Models\Building;

class BuildingResource extends BaseResource
{
    protected static ?string $model = Building::class;

    protected static ?string $slug = 'realestate/building';

    protected static ?string $navigationGroup = 'Realestate';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


}
