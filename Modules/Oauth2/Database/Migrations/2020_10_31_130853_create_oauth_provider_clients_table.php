<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOauthProviderClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oauth_provider_clients', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('provider_id')->unsigned();
            $table->string('client_id');
            $table->string('client_secret');
            $table->string('host')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oauth_provider_clients');
    }
}
