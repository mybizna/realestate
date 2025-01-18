<?php

namespace Modules\Realestate\Models;

use Modules\Base\Models\BaseModel;
use Modules\Realestate\Models\Tenancy;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;

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
    public function tenancy(): BelongsTo
    {
        return $this->belongsTo(Tenancy::class);
    }


    public function migration(Blueprint $table): void
    {
        $table->id();

        $table->string('title');
        $table->foreignId('tenancy_id')->nullable()->constrained(table: 'realestate_tenancy')->onDelete('set null');
        $table->double('amount', 8, 2)->nullable();
        $table->dateTime('billing_date')->nullable();

    }
}
