<?php

namespace Modules\Realestate\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
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
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('title')->html('text')->ordering(true);
        $fields->name('building_id')->html('recordpicker')->table(['realestate', 'building'])->ordering(true);
        $fields->name('type')->html('select')->ordering(true);
        $fields->name('amount')->html('text')->ordering(true);
        $fields->name('deposit')->html('text')->ordering(true);
        $fields->name('goodwill')->html('text')->ordering(true);
        $fields->name('rooms')->html('text')->ordering(true);
        $fields->name('bathrooms')->html('text')->ordering(true);
        $fields->name('is_full')->html('switch')->ordering(true);

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

        $fields->name('title')->html('text')->group('w-1/2');
        $fields->name('building_id')->html('recordpicker')->table(['realestate', 'building'])->group('w-1/2');
        $fields->name('type')->html('select')->options(['single' => 'Single', 'bedsitter' => 'Bedsitter', 'one_bedroom' => 'One Bedroom', 'two_bedroom' => 'Two Bedroom', 'three_bedroom' => 'Three Bedroom', 'four_bedroom' => 'Four Bedroom'])->group('w-1/2');
        $fields->name('amount')->html('text')->group('w-1/2');
        $fields->name('deposit')->html('text')->group('w-1/2');
        $fields->name('goodwill')->html('text')->group('w-1/2');
        $fields->name('rooms')->html('text')->group('w-1/2');
        $fields->name('bathrooms')->html('text')->group('w-1/2');
        $fields->name('is_full')->html('switch')->group('w-1/2');
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

        $fields->name('title')->html('text')->group('w-1/6');
        $fields->name('building_id')->html('recordpicker')->table(['realestate', 'building'])->group('w-1/6');
        $fields->name('type')->html('select')->options(['single' => 'Single', 'bedsitter' => 'Bedsitter', 'one_bedroom' => 'One Bedroom', 'two_bedroom' => 'Two Bedroom', 'three_bedroom' => 'Three Bedroom', 'four_bedroom' => 'Four Bedroom'])->group('w-1/6');
        $fields->name('is_full')->html('switch')->group('w-1/6');

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
        $this->fields->string('title');
        $this->fields->string('description')->nullable();
        $this->fields->foreignId('building_id')->nullable();
        $this->fields->enum('type', ['single', 'bedsitter', 'one_bedroom', 'two_bedroom', 'three_bedroom', 'four_bedroom'])->default('one_bedroom');
        $this->fields->double('amount', 8, 2)->nullable();
        $this->fields->double('deposit', 8, 2)->nullable();
        $this->fields->double('goodwill', 8, 2)->nullable();
        $this->fields->string('rooms');
        $this->fields->string('bathrooms');
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
        Migration::addForeign($table, 'realestate_building', 'building_id');
    }
}
