<?php

namespace Modules\Realestate\Entities;

use Modules\Base\Entities\BaseModel;

class ReadingGas extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['name', 'tenancy_id', 'invoice_id', 'reading', 'units', 'billing_period', 'billing_date'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_reading_gas";

}
