<?php

namespace Modules\Realestate\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;

use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Classes\Views\FormBuilder;

class Town extends BaseModel
{
    /**
     * The fields that can be filled
     * @var array<string>
     */
    protected $fillable = ['name', 'region_id', 'description'];

    /**
     * List of tables names that are need in this model during migration.
     * @var array<string>
     */
    public array $migrationDependancy = ['realestate_region'];

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = "realestate_town";


    public function  listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('name')->type('text')->ordering(true);
        $fields->name('region_id')->type('recordpicker')->table('realestate_region')->ordering(true);


        return $fields;

    }
    
    public function formBuilder(): FormBuilder
{
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('name')->type('text')->group('w-1/2');
        $fields->name('region_id')->type('recordpicker')->table('realestate_region')->group('w-1/2');
        $fields->name('description')->type('text')->group('w-1/2');
            

        return $fields;

    }

    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('name')->type('text')->group('w-1/6');
        $fields->name('region_id')->type('recordpicker')->table('realestate_region')->group('w-1/6');


        return $fields;

    }
    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->string('name');
        $table->foreignId('region_id')->nullable();
        $table->string('description')->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'realestate_region', 'region_id');
    }
}
