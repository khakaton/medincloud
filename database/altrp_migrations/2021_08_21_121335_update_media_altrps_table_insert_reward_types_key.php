<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateMediaAltrpsTableInsertRewardTypesKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reward_types', function (Blueprint $table) {
            $table->foreign('media_id')->references('id')->on('altrp_media')->onUpdate('set null')->onDelete('set null');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reward_types', function (Blueprint $table) {
            
        });
    }
}
