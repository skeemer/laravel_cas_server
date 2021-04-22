<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProxyGrantingTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cas_proxy_granting_tickets', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->id();
            $table->string('ticket', 256)->unique();
            $table->string('pgt_url', 1024);
            $table->foreignId('service_id')->references('id')->on('cas_services');
            $table->foreignId('user_id')->references(config('cas.user_table.id'))->on(config('cas.user_table.name'));
            $table->text('proxies')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('expire_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cas_proxy_granting_tickets');
    }
}
