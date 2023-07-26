<?php

namespace Modules\Realestate\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;
use Modules\Core\Classes\Views\FormBuilder;
use Modules\Core\Classes\Views\ListTable;

class Building extends BaseModel
{

    protected $fillable = ['name', 'estate_id', 'type', 'description', 'units', 'default_deposit', 'default_goodwill', 'default_amount', 'is_full'];
    public $migrationDependancy = ['realestate_estate'];
    protected $table = "realestate_building";

    public function listTable()
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('name')->type('text')->ordering(true);
        $fields->name('estate_id')->type('recordpicker')->table('realestate_estate')->ordering(true);
        $fields->name('type')->type('text')->ordering(true);
        $fields->name('description')->type('text')->ordering(true);
        $fields->name('units')->type('text')->ordering(true);
        $fields->name('default_deposit')->type('text')->ordering(true);
        $fields->name('default_goodwill')->type('text')->ordering(true);
        $fields->name('default_amount')->type('text')->ordering(true);
        $fields->name('is_full')->type('text')->ordering(true);

        return $fields;

    }

    public function formBuilder()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('name')->type('text')->group('w-1/2');
        $fields->name('estate_id')->type('recordpicker')->table('realestate_estate')->group('w-1/2');
        $fields->name('type')->type('text')->group('w-1/2');
        $fields->name('description')->type('text')->group('w-1/2');
        $fields->name('units')->type('text')->group('w-1/2');
        $fields->name('default_deposit')->type('text')->group('w-1/2');
        $fields->name('default_goodwill')->type('text')->group('w-1/2');
        $fields->name('default_amount')->type('text')->group('w-1/2');
        $fields->name('is_full')->type('text')->group('w-1/2');

        return $fields;

    }

    public function filter()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('name')->type('text')->group('w-1/6');
        $fields->name('estate_id')->type('recordpicker')->table('realestate_estate')->group('w-1/6');
        $fields->name('type')->type('text')->group('w-1/6');
        $fields->name('units')->type('text')->group('w-1/6');
        $fields->name('default_deposit')->type('text')->group('w-1/6');
        $fields->name('default_goodwill')->type('text')->group('w-1/6');
        $fields->name('default_amount')->type('text')->group('w-1/6');
        $fields->name('is_full')->type('text')->group('w-1/6');

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
        $table->string('name');
        $table->foreignId('estate_id')->nullable();
        $table->enum('type', ['apartment', 'maisonette', 'bungalow'])->default('apartment')->nullable();
        $table->string('description')->nullable();
        $table->integer('units')->nullable();
        $table->double('default_deposit', 8, 2)->nullable();
        $table->double('default_goodwill', 8, 2)->nullable();
        $table->double('default_amount', 8, 2)->nullable();
        $table->boolean('is_full')->default(0)->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'realestate_estate', 'estate_id');
    }
}
