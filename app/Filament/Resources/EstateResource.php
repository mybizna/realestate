<?php

namespace Modules\Realestate\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Realestate\Models\Estate;

class EstateResource extends BaseResource
{
    protected static ?string $model = Estate::class;

    protected static ?string $slug = 'realestate/estate';

    protected static ?string $navigationGroup = 'Realestate';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
