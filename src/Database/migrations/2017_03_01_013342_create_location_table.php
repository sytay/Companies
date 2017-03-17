<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationTable extends Migration {

    private $_table = NULL;
    private $fileds = NULL;

    public function __construct() {
        $this->_table = 'locations';
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        /**
         * Existing table
         */

        
        if (!Schema::hasTable($this->_table)) {
            Schema::create($this->_table, function (Blueprint $table) {
                $table->increments('location_id');
            });
        }
        
        

        /**
         * Existing fields
         */
        //site_id

        
        if (!Schema::hasColumn($this->_table, 'Location_id')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->increments('location_id');
            });
        }
        
        //site_name
        if (!Schema::hasColumn($this->_table, 'location_name')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->string('location_name', 255);
            });
        }
        
        //status_id
        if (!Schema::hasColumn($this->_table, 'location_id_alias')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->integer('location_id_alias')->default(0);
            });
        }
        
        
         if (!Schema::hasColumn($this->_table, 'location_status')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->integer('location_status')->default(0);
            });
        }
         
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('locations');
    }

}
