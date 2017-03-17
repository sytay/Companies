<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration {

    private $_table = NULL;
    private $fileds = NULL;

    public function __construct() {
        $this->_table = 'works';
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
                $table->increments('work_id');
                $table->string('work_name');
            });
        }
        
        

        /**
         * Existing fields
         */
        //site_id

        
        if (!Schema::hasColumn($this->_table, 'work_id')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->increments('work_id');
            });
        }
        
        //site_name
        if (!Schema::hasColumn($this->_table, 'work_name')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->string('work_name', 255);
            });
        }
        
        if (!Schema::hasColumn($this->_table, 'work_category')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->integer('work_category');
            });
        }
        
        
        if (!Schema::hasColumn($this->_table, 'work_description')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->string('work_description')->null(true);
            });
        }
        
        if (!Schema::hasColumn($this->_table, 'work_salary')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->integer('work_salary')->default(0);
            });
        }
        
        //status_id
        if (!Schema::hasColumn($this->_table, 'work_status')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->integer('work_status')->default(1);
            });
        }
         
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('works');
    }

}
