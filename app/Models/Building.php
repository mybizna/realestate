<?php

namespace Modules\Realestate\Models;

use Modules\Base\Models\BaseModel;
use Modules\Realestate\Models\Estate;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Building extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['name', 'slug', 'estate_id', 'type', 'description', 'units', 'default_deposit', 'default_goodwill', 'default_amount', 'is_full'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_building";

    /**
     * Add relationship to Estate
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estate(): BelongsTo
    {
        return $this->belongsTo(Estate::class);
    }

    public function migration(Blueprint $table): void
    {
        $table->id();

        $table->string('name')->nullable();
        $table->string('slug')->nullable();
        $table->foreignId('estate_id')->nullable()->constrained(table: 'realestate_estate')->onDelete('set null');
        $table->enum('type', ['apartment', 'maisonette', 'bungalow'])->nullable();
        $table->text('description')->nullable();
        $table->integer('units')->nullable();
        $table->double('default_deposit', 8, 2)->nullable();
        $table->double('default_goodwill', 8, 2)->nullable();
        $table->double('default_amount', 8, 2)->nullable();
        $table->boolean('is_full')->default(0)->nullable();

    }

}
