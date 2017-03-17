<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration {

    private $_table = NULL;
    private $fileds = NULL;

    public function __construct() {
        $this->_table = 'sites';
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
                $table->increments('site_id');
                $table->string('site_name');
            });
        }

        /**
         * Existing fields
         */
        //site_id
        if (!Schema::hasColumn($this->_table, 'site_id')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->increments('site_id');
            });
        }
        //site_name
        if (!Schema::hasColumn($this->_table, 'site_name')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->string('site_name', 255);
            });
        }
        
        //site_url
        if (!Schema::hasColumn($this->_table, 'site_url')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->string('site_url', 255);
            });
        }
        
        //site_url
        if (!Schema::hasColumn($this->_table, 'site_url_category')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->string('site_url_category', 255);
                $table->null(true);
            });
        }

        //site_image
        if (!Schema::hasColumn($this->_table, 'site_image')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->string('site_image', 255);
                $table->null(true);
            });
        }
        //status_id
        if (!Schema::hasColumn($this->_table, 'site_status')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->integer('site_status');
                $table->default(0);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('sites');
    }

}
