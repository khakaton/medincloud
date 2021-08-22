<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateReportBlogersTableChangeScoresField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ('scores' !== 'scores') {
            Schema::table('report_blogers', function (Blueprint $table) {
                $table->renameColumn('scores', 'scores');
            });
        }

        Schema::table('report_blogers', function (Blueprint $table) {
            $table->string('scores', 191)->change();
            
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
