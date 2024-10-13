<?php

namespace Modules\Realestate\Filament\Resources\BuildingResource\Pages;

use Modules\Base\Filament\Resources\Pages\ListingBase;
use Modules\Realestate\Filament\Resources\BuildingResource;

// Class List that extends ListBase
class Listing extends ListingBase
{
    protected static string $resource = BuildingResource::class;
}
