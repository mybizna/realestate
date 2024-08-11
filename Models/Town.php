<?php

namespace Modules\Realestate\Models;

use Modules\Base\Models\BaseModel;

class Town extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['name', 'slug', 'region_id', 'description'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_town";

}
