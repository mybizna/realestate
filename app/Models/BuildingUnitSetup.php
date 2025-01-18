<?php
namespace Modules\Realestate\Models;

use Base\Casts\Money;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Models\BaseModel;
use Modules\Realestate\Models\Building;

class BuildingUnitSetup extends BaseModel
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
    protected $fillable = ['title', 'building_id', 'amount'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_building_unit_setup";

    /**
     * Add relationship to Building
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }

    public function migration(Blueprint $table): void
    {

        $table->string('title')->nullable();
        $table->string('slug')->nullable();
        $table->integer('amount')->nullable();
        $table->string('currency')->default('USD');
        $table->foreignId('building_id')->nullable()->constrained(table: 'realestate_building')->onDelete('set null');

    }

}
