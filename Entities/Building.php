<?php

namespace Modules\Realestate\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

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
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $type = ['apartment', 'maisonette', 'bungalow'];

        $this->fields->increments('id')->html('hidden');
        $this->fields->string('name')->html('text');
        $this->fields->string('slug')->html('text');
        $this->fields->foreignId('estate_id')->nullable()->html('recordpicker')->relation(['realestate', 'estate']);
        $this->fields->enum('type', $type)->options($type)->default('apartment')->nullable()->html('select');
        $this->fields->string('description')->nullable()->html('textarea');
        $this->fields->integer('units')->nullable()->html('number');
        $this->fields->double('default_deposit', 8, 2)->nullable()->html('amount');
        $this->fields->double('default_goodwill', 8, 2)->nullable()->html('amount');
        $this->fields->double('default_amount', 8, 2)->nullable()->html('amount');
        $this->fields->boolean('is_full')->default(0)->nullable()->html('switch');
    }



  

}
