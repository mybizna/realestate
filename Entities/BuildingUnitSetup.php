<?php

namespace Modules\Realestate\Entities;

use Modules\Base\Entities\BaseModel;

class BuildingUnitSetup extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['title', 'building_id', 'amount'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_building_unit_setup";

}
