<?php

namespace Modules\Realestate\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
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
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('name')->html('text')->ordering(true);
        $fields->name('estate_id')->html('recordpicker')->table(['realestate', 'estate'])->ordering(true);
        $fields->name('type')->html('text')->ordering(true);
        $fields->name('description')->html('text')->ordering(true);
        $fields->name('units')->html('text')->ordering(true);
        $fields->name('default_deposit')->html('text')->ordering(true);
        $fields->name('default_goodwill')->html('text')->ordering(true);
        $fields->name('default_amount')->html('text')->ordering(true);
        $fields->name('is_full')->html('text')->ordering(true);

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
        $fields->name('estate_id')->html('recordpicker')->table(['realestate', 'estate'])->group('w-1/2');
        $fields->name('type')->html('text')->group('w-1/2');
        $fields->name('description')->html('text')->group('w-1/2');
        $fields->name('units')->html('text')->group('w-1/2');
        $fields->name('default_deposit')->html('text')->group('w-1/2');
        $fields->name('default_goodwill')->html('text')->group('w-1/2');
        $fields->name('default_amount')->html('text')->group('w-1/2');
        $fields->name('is_full')->html('text')->group('w-1/2');

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
        $fields->name('estate_id')->html('recordpicker')->table(['realestate', 'estate'])->group('w-1/6');
        $fields->name('type')->html('text')->group('w-1/6');
        $fields->name('units')->html('text')->group('w-1/6');
        $fields->name('default_deposit')->html('text')->group('w-1/6');
        $fields->name('default_goodwill')->html('text')->group('w-1/6');
        $fields->name('default_amount')->html('text')->group('w-1/6');
        $fields->name('is_full')->html('text')->group('w-1/6');

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
        $this->fields->foreignId('estate_id')->nullable();
        $this->fields->enum('type', ['apartment', 'maisonette', 'bungalow'])->default('apartment')->nullable();
        $this->fields->string('description')->nullable();
        $this->fields->integer('units')->nullable();
        $this->fields->double('default_deposit', 8, 2)->nullable();
        $this->fields->double('default_goodwill', 8, 2)->nullable();
        $this->fields->double('default_amount', 8, 2)->nullable();
        $this->fields->boolean('is_full')->default(0)->nullable();
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
        Migration::addForeign($table, 'realestate_estate', 'estate_id');
    }
}
