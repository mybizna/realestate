<?php

namespace Modules\Realestate\Models;

use Modules\Base\Models\BaseModel;
use Modules\Realestate\Models\Building;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BuildingUnitSetup extends BaseModel
{
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
        $table->id();

        $table->string('title')->nullable();
        $table->string('slug')->nullable();
        $table->double('amount', 8, 2)->nullable();
        $table->foreignId('building_id')->nullable()->constrained(table: 'realestate_building')->onDelete('set null');

    }

}
