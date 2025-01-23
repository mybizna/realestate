<?php

namespace Modules\Realestate\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Realestate\Models\TenancyInvoice;

class TenancyInvoiceResource extends BaseResource
{
    protected static ?string $model = TenancyInvoice::class;

    protected static ?string $slug = 'realestate/tenancy/invoice';

    protected static ?string $navigationGroup = 'Realestate';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


}
