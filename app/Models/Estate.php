<?php
namespace Modules\Realestate\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Models\BaseModel;
use Modules\Realestate\Models\Town;

class Estate extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['name', 'slug', 'description', 'town_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_estate";

    /**
     * Add relationship to Town
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function town(): BelongsTo
    {
        return $this->belongsTo(Town::class);
    }

    public function migration(Blueprint $table): void
    {

        $table->string('name')->nullable();
        $table->string('slug')->nullable();
        $table->text('description')->nullable();
        $table->unsignedBigInteger('town_id')->nullable();
    }

    public function post_migration(Blueprint $table): void
    {
        $table->foreign('town_id')->references('id')->on('realestate_town')->onDelete('set null');
    }

}
