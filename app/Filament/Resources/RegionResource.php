<?php

namespace Modules\Realestate\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Realestate\Models\Region;

class RegionResource extends BaseResource
{
    protected static ?string $model = Region::class;

    protected static ?string $slug = 'realestate/region';

    protected static ?string $navigationGroup = 'Realestate';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


}
