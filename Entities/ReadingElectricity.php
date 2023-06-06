<?php

namespace Modules\Realestate\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;

class ReadingElectricity extends BaseModel
{

    protected $fillable = ['name', 'tenancy_id', 'invoice_id', 'reading', 'units', 'billing_period', 'billing_date'];
    public $migrationDependancy = ['realestate_tenancy', 'account_invoice'];
    protected $table = "realestate_reading_electricity";

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->integer('reading');
        $table->foreignId('tenancy_id')->nullable();
        $table->foreignId('invoice_id')->nullable();
        $table->integer('units');
        $table->char('billing_period', 20)->nullable();
        $table->dateTime('billing_date')->nullable();
    }


    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'realestate_tenancy', 'tenancy_id');
        Migration::addForeign($table, 'account_invoice', 'invoice_id');
    }
}
