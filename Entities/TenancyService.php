<?php

namespace Modules\Realestate\Entities;

use Modules\Base\Entities\BaseModel;

class TenancyService extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['title', 'tenancy_id', 'amount', 'billing_date'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_tenancy_service";

}
