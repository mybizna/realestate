<?php
namespace Modules\Realestate\Models;

use Base\Casts\Money;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Models\BaseModel;
use Modules\Realestate\Models\Estate;

class Building extends BaseModel
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

        $table->string('name')->nullable();
        $table->string('slug')->nullable();
        $table->foreignId('estate_id')->nullable()->constrained(table: 'realestate_estate')->onDelete('set null');
        $table->enum('type', ['apartment', 'maisonette', 'bungalow'])->nullable();
        $table->text('description')->nullable();
        $table->integer('units')->nullable();
        $table->integer('default_deposit')->nullable();
        $table->integer('default_goodwill')->nullable();
        $table->integer('default_amount')->nullable();
        $table->string('currency')->default('USD');
        $table->boolean('is_full')->default(0)->nullable();

    }

}
