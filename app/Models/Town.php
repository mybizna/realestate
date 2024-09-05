<?php

namespace Modules\Realestate\Models;

use Modules\Base\Models\BaseModel;
use Modules\Realestate\Models\Region;

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

    /**
     * Add relationship to Region
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

}
