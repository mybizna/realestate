<?php

namespace Modules\Realestate\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;

class Tenancy extends BaseModel
{

    protected $fillable = ['title', 'description', 'unit_id', 'partner_id', 'type', 'amount', 'deposit', 'goodwill', 'rooms', 'billing_date', 'is_merged_bill', 'is_started', 'is_closed', 'bill_gas', 'bill_water', 'bill_electricity'];
    public $migrationDependancy = ['realestate_unit', 'partner'];
    protected $table = "realestate_tenancy";

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
        $table->integer('unit_id')->unsigned()->nullable();
        $table->integer('partner_id')->unsigned()->nullable();
        $table->enum('type', ['weekly', 'bi_weekly', 'monthly', 'quarterly', 'bi_annually', 'annually',])->default('monthly');
        $table->double('amount', 8, 2)->nullable();
        $table->double('deposit', 8, 2)->nullable();
        $table->double('goodwill', 8, 2)->nullable();
        $table->integer('rooms');
        $table->dateTime('billing_date')->nullable();
        $table->boolean('is_merged_bill')->default(true)->nullable();
        $table->boolean('is_started')->default(false)->nullable();
        $table->boolean('is_closed')->default(false)->nullable();
        $table->boolean('bill_gas')->default(false)->nullable();
        $table->boolean('bill_water')->default(false)->nullable();
        $table->boolean('bill_electricity')->default(false)->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        if (Migration::checkKeyExist('realestate_tenancy', 'unit_id')) {
            $table->foreign('unit_id')->references('id')->on('realestate_unit')->nullOnDelete();
        }
        if (Migration::checkKeyExist('realestate_tenancy', 'partner_id')) {
            $table->foreign('partner_id')->references('id')->on('partner')->nullOnDelete();
        }
    }



    /*
    tenancy_services_ids = fields.One2many('mybizna.realestate.tenancy_services', 'tenancy_id',
                                           'Tenancy Services',
                                           track_visibility='onchange')

    tenancy_invoices_ids = fields.One2many('mybizna.realestate.tenancy_invoices', 'tenancy_id',
                                           'Tenancy Invoices',
                                           track_visibility='onchange')

    water_ids = fields.One2many('mybizna.realestate.reading_water', 'tenancy_id',
                                'Water',
                                track_visibility='onchange')

    gas_ids = fields.One2many('mybizna.realestate.reading_gas', 'tenancy_id',
                              'Gas',
                              track_visibility='onchange')

    electricity_ids = fields.One2many('mybizna.realestate.reading_electricity', 'tenancy_id',
                                      'Electricity',
                                      track_visibility='onchange')*/
}
