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
    public array $migrationDependancy = ['core_country', 'core_state'];

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

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {

        $structure['table'] = ['name', 'country_id', 'state_id'];
        $structure['form'] = [
            ['label' => 'Name', 'class' => 'col-span-full', 'fields' => ['name']],
            ['label' => 'Region', 'class' => 'col-span-full md:col-span-6', 'fields' => ['country_id', 'state_id']],
            ['label' => 'Description', 'class' => 'col-span-full md:col-span-6', 'fields' => ['description']],
        ];
        $structure['filter'] = ['name', 'country_id', 'state_id'];

        return $structure;
    }

}
