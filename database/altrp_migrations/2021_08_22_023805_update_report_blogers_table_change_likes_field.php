<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateReportBlogersTableChangeLikesField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ('likes' !== 'likes') {
            Schema::table('report_blogers', function (Blueprint $table) {
                $table->renameColumn('likes', 'likes');
            });
        }

        Schema::table('report_blogers', function (Blueprint $table) {
            $table->string('likes', 191)->change();
            
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
