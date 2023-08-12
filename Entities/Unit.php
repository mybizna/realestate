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

        $fields->name('title')->type('text')->ordering(true);
        $fields->name('building_id')->type('recordpicker')->table(['realestate', 'building'])->ordering(true);
        $fields->name('type')->type('select')->ordering(true);
        $fields->name('amount')->type('text')->ordering(true);
        $fields->name('deposit')->type('text')->ordering(true);
        $fields->name('goodwill')->type('text')->ordering(true);
        $fields->name('rooms')->type('text')->ordering(true);
        $fields->name('bathrooms')->type('text')->ordering(true);
        $fields->name('is_full')->type('switch')->ordering(true);

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

        $fields->name('title')->type('text')->group('w-1/2');
        $fields->name('building_id')->type('recordpicker')->table(['realestate', 'building'])->group('w-1/2');
        $fields->name('type')->type('select')->options(['single' => 'Single', 'bedsitter' => 'Bedsitter', 'one_bedroom' => 'One Bedroom', 'two_bedroom' => 'Two Bedroom', 'three_bedroom' => 'Three Bedroom', 'four_bedroom' => 'Four Bedroom'])->group('w-1/2');
        $fields->name('amount')->type('text')->group('w-1/2');
        $fields->name('deposit')->type('text')->group('w-1/2');
        $fields->name('goodwill')->type('text')->group('w-1/2');
        $fields->name('rooms')->type('text')->group('w-1/2');
        $fields->name('bathrooms')->type('text')->group('w-1/2');
        $fields->name('is_full')->type('switch')->group('w-1/2');
        $fields->name('description')->type('text')->group('w-full');

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

        $fields->name('title')->type('text')->group('w-1/6');
        $fields->name('building_id')->type('recordpicker')->table(['realestate', 'building'])->group('w-1/6');
        $fields->name('type')->type('select')->options(['single' => 'Single', 'bedsitter' => 'Bedsitter', 'one_bedroom' => 'One Bedroom', 'two_bedroom' => 'Two Bedroom', 'three_bedroom' => 'Three Bedroom', 'four_bedroom' => 'Four Bedroom'])->group('w-1/6');
        $fields->name('is_full')->type('switch')->group('w-1/6');

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
        $table->increments('id');
        $table->string('title');
        $table->string('description')->nullable();
        $table->foreignId('building_id')->nullable();
        $table->enum('type', ['single', 'bedsitter', 'one_bedroom', 'two_bedroom', 'three_bedroom', 'four_bedroom'])->default('one_bedroom');
        $table->double('amount', 8, 2)->nullable();
        $table->double('deposit', 8, 2)->nullable();
        $table->double('goodwill', 8, 2)->nullable();
        $table->string('rooms');
        $table->string('bathrooms');
        $table->boolean('is_full')->default(0)->nullable();
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
