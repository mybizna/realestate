<?php

namespace Modules\Realestate\Models;

use Modules\Base\Models\BaseModel;
use Modules\Core\Models\Country;
use Modules\Realestate\Models\State;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Region extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['name', 'slug', 'description', 'country_id', 'state_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_region";

    /**
     * Add relationship to Country
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Add relationship to State
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function migration(Blueprint $table): void
    {
        $table->id();

        $table->string('name');
        $table->string('slug');
        $table->string('description')->nullable();
        $table->foreignId('country_id')->nullable()->constrained(table: 'core_country')->onDelete('set null');
        $table->foreignId('state_id')->nullable()->constrained(table: 'core_state')->onDelete('set null');

    }

}
