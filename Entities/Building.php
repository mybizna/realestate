<?php

namespace Modules\Realestate\Entities;

use Modules\Base\Entities\BaseModel;

class Building extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['name', 'slug', 'estate_id', 'type', 'description', 'units', 'default_deposit', 'default_goodwill', 'default_amount', 'is_full'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_building";

}
