<?php

namespace Modules\Realestate\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;

class TenancyInvoice extends BaseModel
{

    protected $fillable = ['title', 'tenancy_id', 'invoice_id',  'billing_period'];
    public $migrationDependancy = ['realestate_tenancy','account_invoice'];
    protected $table = "realestate_tenancy_invoice";

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {

        $table->increments('id');
        $table->foreignId('tenancy_id')->nullable();
        $table->foreignId('invoice_id')->nullable();
        $table->char('billing_period', 20)->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'realestate_tenancy', 'tenancy_id');
        Migration::addForeign($table, 'account_invoice', 'invoice_id');
    }
}
