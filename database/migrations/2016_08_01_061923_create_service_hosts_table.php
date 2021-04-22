<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceHostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cas_service_hosts', function (Blueprint $table) {
            $table->id();
            $table->string('host')->charset('utf8')->collate('utf8_general_ci')->unique();
            $table->foreignId('service_id')->references('id')->on('cas_services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cas_service_hosts');
    }
}
