<?php

namespace Modules\Realestate\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

class Unit extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['title', 'description', 'building_id', 'type', 'amount', 'deposit', 'goodwill', 'rooms', 'bathrooms', 'is_full'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['title'];

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = ['realestate_building'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_unit";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('text');
        $this->fields->string('title')->html('text');
        $this->fields->string('description')->nullable()->html('textarea');
        $this->fields->foreignId('building_id')->nullable()->html('recordpicker')->table(['realestate', 'building']);
        $this->fields->enum('type', ['single', 'bedsitter', 'one_bedroom', 'two_bedroom', 'three_bedroom', 'four_bedroom'])->default('one_bedroom')->html('select');
        $this->fields->double('amount', 8, 2)->nullable()->html('amount');
        $this->fields->double('deposit', 8, 2)->nullable()->html('amount');
        $this->fields->double('goodwill', 8, 2)->nullable()->html('amount');
        $this->fields->string('rooms')->html('number');
        $this->fields->string('bathrooms')->html('number');
        $this->fields->boolean('is_full')->default(0)->nullable()->html('switch');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure = [
            'table' => ['title', 'building_id', 'type', 'amount', 'deposit', 'goodwill', 'rooms', 'bathrooms', 'is_full'],
            'filter' => ['title', 'building_id', 'type'],
        ];

        return $structure;
    }

}
