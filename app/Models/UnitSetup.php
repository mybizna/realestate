<?php

namespace Modules\Realestate\Models;

use Modules\Base\Models\BaseModel;
use Modules\Realestate\Models\Unit;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UnitSetup extends BaseModel
{
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
        $table->id();

        $table->string('title')->nullable();
        $table->string('slug')->nullable();
        $table->foreignId('unit_id')->nullable()->constrained(table: 'realestate_unit')->onDelete('set null');
        $table->double('amount', 8, 2)->nullable();

    }
}
