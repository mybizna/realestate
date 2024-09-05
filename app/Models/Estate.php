<?php

namespace Modules\Realestate\Models;

use Modules\Base\Models\BaseModel;
use Modules\Realestate\Models\Town;

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

    /**
     * Add relationship to Town
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function town()
    {
        return $this->belongsTo(Town::class);
    }

}
