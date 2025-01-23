<?php

namespace Modules\Realestate\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Realestate\Models\Tenancy;

class TenancyResource extends BaseResource
{
    protected static ?string $model = Tenancy::class;

    protected static ?string $slug = 'realestate/tenancy';

    protected static ?string $navigationGroup = 'Realestate';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
}
