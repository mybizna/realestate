<?php

namespace Modules\Realestate\Entities;

use Modules\Base\Entities\BaseModel;

class Tenancy extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['title', 'slug', 'description', 'unit_id', 'partner_id', 'type', 'amount', 'deposit', 'goodwill', 'rooms', 'billing_date', 'is_merged_bill', 'is_started', 'is_closed', 'bill_gas', 'bill_water', 'bill_electricity'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_tenancy";

}
