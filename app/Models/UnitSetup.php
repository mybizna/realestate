<?php

namespace Modules\Realestate\Models;

use Modules\Base\Models\BaseModel;
use Modules\Realestate\Models\Unit;

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

    /**
     * Add relationship to Unit
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

}
