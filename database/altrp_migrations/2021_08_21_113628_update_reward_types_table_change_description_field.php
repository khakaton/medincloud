<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateRewardTypesTableChangeDescriptionField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ('description' !== 'description') {
            Schema::table('reward_types', function (Blueprint $table) {
                $table->renameColumn('description', 'description');
            });
        }

        Schema::table('reward_types', function (Blueprint $table) {
            $table->string('description', 191)->nullable()->change();
            
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
