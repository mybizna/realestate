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
        $table->integer('tenancy_id')->unsigned()->nullable();
        $table->integer('invoice_id')->unsigned()->nullable();
        $table->integer('units');
        $table->char('billing_period', 20)->nullable();
        $table->dateTime('billing_date')->nullable();
    }


    public function post_migration(Blueprint $table)
    {
        if (Migration::checkKeyExist('realestate_reading_electricity', 'tenancy_id')) {
            $table->foreign('tenancy_id')->references('id')->on('realestate_tenancy')->nullOnDelete();
        }
        if (Migration::checkKeyExist('realestate_reading_electricity', 'invoice_id')) {
            $table->foreign('invoice_id')->references('id')->on('account_invoice')->nullOnDelete();
        }
    }
}
