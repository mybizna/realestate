<?php

namespace Modules\Realestate\Models;

use Modules\Account\Models\Invoice;
use Modules\Base\Models\BaseModel;
use Modules\Realestate\Models\Tenancy;

class ReadingGas extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['name', 'tenancy_id', 'invoice_id', 'reading', 'units', 'billing_period', 'billing_date'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_reading_gas";

    /**
     * Add relationship to Tenancy
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tenancy()
    {
        return $this->belongsTo(Tenancy::class);
    }

    /**
     * Add relationship to Invoice
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

}
