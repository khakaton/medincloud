<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateBlogersTableInsertReportBlogerKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('report_blogers', function (Blueprint $table) {
            $table->foreign('bloger_id')->references('id')->on('blogers')->onUpdate('set null')->onDelete('set null');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('report_blogers', function (Blueprint $table) {
            
        });
    }
}
