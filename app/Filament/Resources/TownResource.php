<?php

namespace Modules\Realestate\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Realestate\Models\Town;

class TownResource extends BaseResource
{
    protected static ?string $model = Town::class;

    protected static ?string $slug = 'realestate/town';

    protected static ?string $navigationGroup = 'Realestate';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
