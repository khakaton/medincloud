<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateBlogersTableInsertMediaIdField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogers', function (Blueprint $table) {
            $table->bigInteger('media_id')->nullable()->unsigned();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogers', function (Blueprint $table) {
            
        });
    }
}
