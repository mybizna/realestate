<?php

namespace Modules\Realestate\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class Estate extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['name', 'description', 'town_id'];

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
    public array $migrationDependancy = ['realestate_town'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_estate";

    /**
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('name')->html('text')->ordering(true);
        $fields->name('town_id')->html('recordpicker')->table(['realestate', 'town'])->ordering(true);

        return $fields;

    }

    /**
     * Function for defining list of fields in form view.
     *
     * @return FormBuilder
     */
    public function formBuilder(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('name')->html('text')->group('w-1/2');
        $fields->name('town_id')->html('recordpicker')->table(['realestate', 'town'])->group('w-1/2');
        $fields->name('description')->html('text')->group('w-full');

        return $fields;

    }

    /**
     * Function for defining list of fields in filter view.
     *
     * @return FormBuilder
     */
    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('name')->html('text')->group('w-1/6');
        $fields->name('town_id')->html('recordpicker')->table(['realestate', 'town'])->group('w-1/6');

        return $fields;

    }
    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table): void
    {
        $this->fields->increments('id');
        $this->fields->string('name');
        $this->fields->string('description')->nullable();
        $this->fields->foreignId('town_id')->nullable();
    }
    /**
     * Handle post migration processes for adding foreign keys.
     *
     * @param Blueprint $table
     *
     * @return void
     */
    public function post_migration(Blueprint $table): void
    {
        Migration::addForeign($table, 'realestate_town', 'town_id');
    }
}
