<?php

namespace Modules\Realestate\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;

class TenancyService extends BaseModel
{

    protected $fillable = ['title', 'tenancy_id', 'amount',  'billing_date'];
    public $migrationDependancy = ['realestate_tenancy'];
    protected $table = "realestate_tenancy_service";

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
        $table->integer('tenancy_id')->unsigned()->nullable();
        $table->double('amount', 8, 2)->nullable();
        $table->dateTime('billing_date')->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        if (Migration::checkKeyExist('realestate_tenancy_service', 'tenancy_id')) {
            $table->foreign('tenancy_id')->references('id')->on('realestate_tenancy')->nullOnDelete();
        }
    }
}
