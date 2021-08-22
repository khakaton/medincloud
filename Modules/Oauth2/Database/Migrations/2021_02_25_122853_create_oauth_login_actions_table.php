<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOauthLoginActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oauth_login_actions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('provider_client_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->string('source')->nullable();
            $table->string('model_class')->nullable();
            $table->text('data')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('oauth_login_actions');
    }
}
