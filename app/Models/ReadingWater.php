<?php

namespace Modules\Realestate\Models;

use Modules\Account\Models\Invoice;
use Modules\Base\Models\BaseModel;
use Modules\Realestate\Models\Tenancy;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReadingWater extends BaseModel
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
    protected $table = "realestate_reading_water";

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
        $table->id();

        $table->foreignId('tenancy_id')->nullable()->constrained(table: 'realestate_tenancy')->onDelete('set null');
        $table->foreignId('invoice_id')->nullable()->constrained(table: 'account_invoice')->onDelete('set null');
        $table->integer('reading')->nullable();
        $table->integer('units')->nullable();
        $table->string('billing_period', 20)->nullable();
        $table->dateTime('billing_date')->nullable();

    }

}
