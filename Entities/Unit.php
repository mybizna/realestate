<?php

namespace Modules\Realestate\Entities;

use Modules\Base\Entities\BaseModel;

class Unit extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['title', 'slug', 'description', 'building_id', 'type', 'amount', 'deposit', 'goodwill', 'rooms', 'bathrooms', 'is_full'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_unit";

}
