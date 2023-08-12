<?php

namespace Modules\Realestate\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class TenancyInvoice extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['title', 'tenancy_id', 'invoice_id', 'billing_period'];

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
    public array $migrationDependancy = ['realestate_tenancy', 'account_invoice'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_tenancy_invoice";

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
        $fields->name('tenancy_id')->type('recordpicker')->table(['realestate', 'tenancy'])->ordering(true);
        $fields->name('invoice_id')->type('recordpicker')->table(['account', 'invoice'])->ordering(true);
        $fields->name('billing_period')->type('text')->ordering(true);

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
        $fields->name('tenancy_id')->type('recordpicker')->table(['realestate', 'tenancy'])->group('w-1/2');
        $fields->name('invoice_id')->type('recordpicker')->table(['account', 'invoice'])->group('w-1/2');
        $fields->name('billing_period')->type('text')->group('w-1/2');

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
        $fields->name('tenancy_id')->type('recordpicker')->table(['realestate', 'tenancy'])->group('w-1/6');
        $fields->name('invoice_id')->type('recordpicker')->table(['account', 'invoice'])->group('w-1/6');
        $fields->name('billing_period')->type('text')->group('w-1/6');

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
        $table->foreignId('tenancy_id')->nullable();
        $table->foreignId('invoice_id')->nullable();
        $table->char('billing_period', 20)->nullable();
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
        Migration::addForeign($table, 'account_invoice', 'invoice_id');
    }
}
