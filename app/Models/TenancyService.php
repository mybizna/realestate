<?php

namespace Modules\Realestate\Models;

use Modules\Base\Models\BaseModel;
use Modules\Realestate\Models\Tenancy;

class TenancyService extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['title', 'tenancy_id', 'amount', 'billing_date'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_tenancy_service";

    /**
     * Add relationship to Tenancy
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tenancy()
    {
        return $this->belongsTo(Tenancy::class);
    }

}
