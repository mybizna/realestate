<?php
namespace Modules\Realestate\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Models\BaseModel;
use Modules\Realestate\Models\Region;

class Town extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['name', 'slug', 'region_id', 'description'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_town";

    /**
     * Add relationship to Region
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function migration(Blueprint $table): void
    {

        $table->unsignedBigInteger('region_id')->nullable();
        $table->string('name');
        $table->string('slug');
        $table->string('description')->nullable();

    }

    public function post_migration(Blueprint $table): void
    {
        $table->foreign('region_id')->references('id')->on('realestate_region')->onDelete('set null');
    }

}
