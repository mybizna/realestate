<?php

namespace Modules\Realestate\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Realestate\Models\BuildingUnitSetup;

class BuildingUnitSetupResource extends BaseResource
{
    protected static ?string $model = BuildingUnitSetup::class;

    protected static ?string $slug = 'realestate/building/unit/setup';

    protected static ?string $navigationGroup = 'Realestate';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
