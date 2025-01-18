<?php

namespace Modules\Realestate\Models;

use Modules\Base\Models\BaseModel;
use Modules\Realestate\Models\Building;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Unit extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['title', 'slug', 'description', 'building_id', 'type', 'amount', 'deposit', 'goodwill', 'rooms', 'bathrooms', 'is_full'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_unit";

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

        $table->string('title');
        $table->string('slug');
        $table->string('description')->nullable();
        $table->foreignId('building_id')->nullable()->constrained(table: 'realestate_building')->onDelete('set null');
        $table->enum('type', ['single', 'bedsitter', 'one_bedroom', 'two_bedroom', 'three_bedroom', 'four_bedroom'])->default('one_bedroom');
        $table->double('amount', 8, 2)->nullable();
        $table->double('deposit', 8, 2)->nullable();
        $table->double('goodwill', 8, 2)->nullable();
        $table->integer('rooms');
        $table->integer('bathrooms');
        $table->boolean('is_full')->default(0)->nullable();

    }


}
