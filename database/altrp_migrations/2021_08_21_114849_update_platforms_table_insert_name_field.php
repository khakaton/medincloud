<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdatePlatformsTableInsertNameField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('platforms', function (Blueprint $table) {
            $table->string('name', 191)->default(null);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('platforms', function (Blueprint $table) {
            
        });
    }
}
