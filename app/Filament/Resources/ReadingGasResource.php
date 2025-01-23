<?php

namespace Modules\Realestate\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Realestate\Models\ReadingGas;

class ReadingGasResource extends BaseResource
{
    protected static ?string $model = ReadingGas::class;

    protected static ?string $slug = 'realestate/reading/gas';

    protected static ?string $navigationGroup = 'Realestate';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
