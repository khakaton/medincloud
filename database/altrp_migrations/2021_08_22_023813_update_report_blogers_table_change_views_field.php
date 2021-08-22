<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateReportBlogersTableChangeViewsField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ('views' !== 'views') {
            Schema::table('report_blogers', function (Blueprint $table) {
                $table->renameColumn('views', 'views');
            });
        }

        Schema::table('report_blogers', function (Blueprint $table) {
            $table->string('views', 191)->change();
            
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
