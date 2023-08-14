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
    protected $fillable = ['name', 'estate_id', 'type', 'description', 'units', 'default_deposit', 'default_goodwill', 'default_amount', 'is_full'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['name'];

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = ['realestate_estate'];

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
    public function fields(Blueprint $table): void
    {
        $this->fields->increments('id')->html('text');
        $this->fields->string('name')->html('text');
        $this->fields->foreignId('estate_id')->nullable()->html('recordpicker')->table(['realestate', 'estate']);
        $this->fields->enum('type', ['apartment', 'maisonette', 'bungalow'])->default('apartment')->nullable()->html('select');
        $this->fields->string('description')->nullable()->html('textarea');
        $this->fields->integer('units')->nullable()->html('number');
        $this->fields->double('default_deposit', 8, 2)->nullable()->html('amount');
        $this->fields->double('default_goodwill', 8, 2)->nullable()->html('amount');
        $this->fields->double('default_amount', 8, 2)->nullable()->html('amount');
        $this->fields->boolean('is_full')->default(0)->nullable()->html('switch');
    }

}
