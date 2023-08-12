<?php

namespace Modules\Realestate\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class TenancyService extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['title', 'tenancy_id', 'amount', 'billing_date'];

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
    public array $migrationDependancy = ['realestate_tenancy'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_tenancy_service";

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
        $fields->name('tenancy_id')->type('recordpicker')->table('realestate_tenancy')->ordering(true);
        $fields->name('amount')->type('text')->ordering(true);
        $fields->name('billing_date')->type('date')->ordering(true);

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
        $fields->name('tenancy_id')->type('recordpicker')->table('realestate_tenancy')->group('w-1/2');
        $fields->name('amount')->type('text')->group('w-1/2');
        $fields->name('billing_date')->type('date')->group('w-1/2');

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
        $fields->name('tenancy_id')->type('recordpicker')->table('realestate_tenancy')->group('w-1/6');
        $fields->name('amount')->type('text')->group('w-1/6');
        $fields->name('billing_date')->type('date')->group('w-1/6');

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
        $table->foreignId('tenancy_id')->nullable();
        $table->double('amount', 8, 2)->nullable();
        $table->dateTime('billing_date')->nullable();
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
        Migration::addForeign($table, 'realestate_tenancy', 'tenancy_id');
    }
}
