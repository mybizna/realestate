<?php

namespace Modules\Realestate\Models;

use Modules\Base\Models\BaseModel;
use Modules\Realestate\Models\Building;

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

    /**
     * Add relationship to Building
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function building()
    {
        return $this->belongsTo(Building::class);
    }

}
