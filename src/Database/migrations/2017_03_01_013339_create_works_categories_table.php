<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksCategoriesTable extends Migration {

    private $_table = NULL;
    private $fileds = NULL;

    public function __construct() {
        $this->_table = 'works_categories';
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
                $table->increments('category_id');
                $table->string('category_name');
            });
        }

        /**
         * Existing fields
         */
        //category_id
        if (!Schema::hasColumn($this->_table, 'category_id')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->increments('category_id');
            });
        }
        //category_name
        if (!Schema::hasColumn($this->_table, 'category_name')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->string('category_name', 255);
            });
        }

        //category_parent
        if (!Schema::hasColumn($this->_table, 'category_parent')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->string('category_parent', 255);
            });
        }
        
        //category_description
        if (!Schema::hasColumn($this->_table, 'category_desciption')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->string('category_desciption', 255);
            });
        }
        
        //status_id
        if (!Schema::hasColumn($this->_table, 'category_status')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->integer('category_status');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('works_categories');
    }

}
