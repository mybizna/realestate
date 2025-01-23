<?php

namespace Modules\Realestate\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Realestate\Models\UnitSetup;

class UnitSetupResource extends BaseResource
{
    protected static ?string $model = UnitSetup::class;

    protected static ?string $slug = 'realestate/unit/setup';

    protected static ?string $navigationGroup = 'Realestate';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
