<?php

namespace Modules\Realestate\Models;

use Modules\Base\Models\BaseModel;

class Estate extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['name', 'slug', 'description', 'town_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_estate";

}
