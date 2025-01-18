<?php
namespace Modules\Realestate\Models;

use Base\Casts\Money;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Models\BaseModel;
use Modules\Realestate\Models\Tenancy;

class TenancyService extends BaseModel
{

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'total' => Money::class, // Use the custom MoneyCast
    ];
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

        $table->string('title');
        $table->foreignId('tenancy_id')->nullable()->constrained(table: 'realestate_tenancy')->onDelete('set null');
        $table->integer('amount')->nullable();
        $table->string('currency')->default('USD');
        $table->dateTime('billing_date')->nullable();

    }
}
