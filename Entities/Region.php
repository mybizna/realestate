<?php

namespace Modules\Realestate\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

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
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('hidden');
        $this->fields->string('name')->html('text');
        $this->fields->string('slug')->html('text');
        $this->fields->string('description')->nullable();
        $this->fields->foreignId('country_id')->nullable()->html('recordpicker')->relation(['core', 'country']);
        $this->fields->foreignId('state_id')->nullable()->html('recordpicker')->relation(['core', 'state']);
    }

 


 

}
