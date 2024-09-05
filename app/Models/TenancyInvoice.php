<?php

namespace Modules\Realestate\Models;

use Modules\Account\Models\Invoice;
use Modules\Base\Models\BaseModel;
use Modules\Realestate\Models\Tenancy;

class TenancyInvoice extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['title', 'tenancy_id', 'invoice_id', 'billing_period'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_tenancy_invoice";

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
