<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateRewardTypesTableInsertDescriptionField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reward_types', function (Blueprint $table) {
            $table->string('description', 191)->default(null);
            
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
