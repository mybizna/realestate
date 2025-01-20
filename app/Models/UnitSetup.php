<?php
namespace Modules\Realestate\Models;

use Base\Casts\Money;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Models\BaseModel;
use Modules\Realestate\Models\Unit;

class UnitSetup extends BaseModel
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
    protected $fillable = ['title', 'slug', 'unit_id', 'amount'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_unit_setup";

    /**
     * Add relationship to Unit
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function migration(Blueprint $table): void
    {

        $table->string('title')->nullable();
        $table->string('slug')->nullable();
        $table->unsignedBigInteger('unit_id')->nullable();
        $table->integer('amount')->nullable();
        $table->string('currency')->default('USD');

    }

    public function post_migration(Blueprint $table): void
    {
        $table->foreign('unit_id')->references('id')->on('realestate_unit')->onDelete('set null');
    }
}
