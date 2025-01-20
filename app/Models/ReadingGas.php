<?php
namespace Modules\Realestate\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;
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
        $table->integer('reading')->nullable();
        $table->integer('units')->nullable();
        $table->string('billing_period', 20)->nullable();
        $table->dateTime('billing_date')->nullable();

    }

    public function post_migration(Blueprint $table): void
    {
        $table->foreign('tenancy_id')->references('id')->on(table: 'realestate_tenancy')->onDelete('set null');
        $table->foreign('invoice_id')->references('id')->on(table: 'account_invoice')->onDelete('set null');
    }

}
