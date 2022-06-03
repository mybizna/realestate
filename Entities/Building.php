<?php

namespace Modules\Realestate\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

class Building extends Model
{

    protected $fillable = ['name', 'estate_id', 'type', 'description', 'units', 'default_deposit', 'default_goodwill', 'default_amount', 'is_full'];
    protected $migrationOrder = 5;
    protected $table = "realestate_building";

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
        $table->foreign('estate_id')->references('id')->on('realestate_estate')->nullOnDelete();
        $table->enum('type',['apartment','maisonette','bungalow'])->default('apartment')->nullable();
        $table->string('description')->nullable();
        $table->integer('units')->nullable();
        $table->double('default_deposit', 8, 2)->nullable();
        $table->double('default_goodwill', 8, 2)->nullable();
        $table->double('default_amount', 8, 2)->nullable();
        $table->boolean('is_full')->default(false)->nullable();
    }


    /**
     *        setup_ids = fields.One2many('mybizna.realestate.building_unit_setup', 'building_id',
                                'Building Unit Setup',
                                track_visibility='onchange')

    unit_ids = fields.One2many('mybizna.realestate.unit', 'building_id',
                               'Units',
                               track_visibility='onchange')
     */
}
