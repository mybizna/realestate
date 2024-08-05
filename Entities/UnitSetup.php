<?php

namespace Modules\Realestate\Entities;

use Modules\Base\Entities\BaseModel;

class UnitSetup extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['title', 'slug', 'unit_id', 'amount'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_unit_setup";

}
