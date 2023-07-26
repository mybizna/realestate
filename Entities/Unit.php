<?php

namespace Modules\Realestate\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;
use Modules\Core\Classes\Views\FormBuilder;
use Modules\Core\Classes\Views\ListTable;

class Unit extends BaseModel
{

    protected $fillable = ['title', 'description', 'building_id', 'type', 'amount', 'deposit', 'goodwill', 'rooms', 'bathrooms', 'is_full'];
    public $migrationDependancy = ['realestate_building'];
    protected $table = "realestate_unit";

    public function listTable()
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('title')->type('text')->ordering(true);
        $fields->name('building_id')->type('recordpicker')->table('realestate_building')->ordering(true);
        $fields->name('type')->type('select')->ordering(true);
        $fields->name('amount')->type('text')->ordering(true);
        $fields->name('deposit')->type('text')->ordering(true);
        $fields->name('goodwill')->type('text')->ordering(true);
        $fields->name('rooms')->type('text')->ordering(true);
        $fields->name('bathrooms')->type('text')->ordering(true);
        $fields->name('is_full')->type('switch')->ordering(true);

        return $fields;

    }

    public function formBuilder()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('title')->type('text')->group('w-1/2');
        $fields->name('building_id')->type('recordpicker')->table('realestate_building')->group('w-1/2');
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

    public function filter()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('title')->type('text')->group('w-1/6');
        $fields->name('building_id')->type('recordpicker')->table('realestate_building')->group('w-1/6');
        $fields->name('type')->type('select')->options(['single' => 'Single', 'bedsitter' => 'Bedsitter', 'one_bedroom' => 'One Bedroom', 'two_bedroom' => 'Two Bedroom', 'three_bedroom' => 'Three Bedroom', 'four_bedroom' => 'Four Bedroom'])->group('w-1/6');
        $fields->name('is_full')->type('switch')->group('w-1/6');

        return $fields;

    }
    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
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

    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'realestate_building', 'building_id');
    }
}
