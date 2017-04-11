<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration {

    private $_table = NULL;
    private $fileds = NULL;

    public function __construct() {
        $this->_table = 'companies';
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
                $table->increments('company_id');
                $table->string('company_name');
            });
        }
        
        

        /**
         * Existing fields
         */
        //site_id

        
        if (!Schema::hasColumn($this->_table, 'company_id')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->increments('company_id');
            });
        }
        
        //site_name
        if (!Schema::hasColumn($this->_table, 'company_name')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->string('company_name', 255);
            });
        }
        
        if (!Schema::hasColumn($this->_table, 'company_address')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->string('company_address');
            });
        }
        
        if (!Schema::hasColumn($this->_table, 'company_location')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->integer('company_location');
            });
        }
        if (!Schema::hasColumn($this->_table, 'company_description')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->string('company_description')->nullable();
            });
        }

        //status_id
        if (!Schema::hasColumn($this->_table, 'company_status')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->integer('company_status')->default(1);
            });
        }
         
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('companies');
    }

}
