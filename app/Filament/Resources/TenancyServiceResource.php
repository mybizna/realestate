<?php

namespace Modules\Realestate\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Realestate\Models\TenancyService;

class TenancyServiceResource extends BaseResource
{
    protected static ?string $model = TenancyService::class;

    protected static ?string $slug = 'realestate/tenancy/service';

    protected static ?string $navigationGroup = 'Realestate';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


}
