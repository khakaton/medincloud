<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateReportBlogersTableInsertPlatformIdField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('report_blogers', function (Blueprint $table) {
            $table->bigInteger('platform_id')->nullable()->unsigned();
            
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
