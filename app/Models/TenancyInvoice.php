<?php
namespace Modules\Realestate\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;
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
    public function tenancy(): BelongsTo
    {
        return $this->belongsTo(Tenancy::class);
    }

    /**
     * Add relationship to Invoice
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    public function migration(Blueprint $table): void
    {

        $table->unsignedBigInteger('tenancy_id')->nullable();
        $table->unsignedBigInteger('invoice_id')->nullable();
        $table->char('billing_period', 20)->nullable();

    }

    public function post_migration(Blueprint $table): void
    {
        $table->foreign('tenancy_id')->references('id')->on('realestate_tenancy')->onDelete('set null');
        $table->foreign('invoice_id')->references('id')->on('account_invoice')->onDelete('set null');
    }
}
