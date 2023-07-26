<?php

namespace Modules\Realestate\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;
use Modules\Core\Classes\Views\FormBuilder;
use Modules\Core\Classes\Views\ListTable;

class TenancyService extends BaseModel
{

    protected $fillable = ['title', 'tenancy_id', 'amount', 'billing_date'];
    public $migrationDependancy = ['realestate_tenancy'];
    protected $table = "realestate_tenancy_service";

    public function listTable()
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('title')->type('text')->ordering(true);
        $fields->name('tenancy_id')->type('recordpicker')->table('realestate_tenancy')->ordering(true);
        $fields->name('amount')->type('text')->ordering(true);
        $fields->name('billing_date')->type('date')->ordering(true);

        return $fields;

    }

    public function formBuilder()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('title')->type('text')->group('w-1/2');
        $fields->name('tenancy_id')->type('recordpicker')->table('realestate_tenancy')->group('w-1/2');
        $fields->name('amount')->type('text')->group('w-1/2');
        $fields->name('billing_date')->type('date')->group('w-1/2');

        return $fields;

    }

    public function filter()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('title')->type('text')->group('w-1/6');
        $fields->name('tenancy_id')->type('recordpicker')->table('realestate_tenancy')->group('w-1/6');
        $fields->name('amount')->type('text')->group('w-1/6');
        $fields->name('billing_date')->type('date')->group('w-1/6');

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
        $table->foreignId('tenancy_id')->nullable();
        $table->double('amount', 8, 2)->nullable();
        $table->dateTime('billing_date')->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'realestate_tenancy', 'tenancy_id');
    }
}
