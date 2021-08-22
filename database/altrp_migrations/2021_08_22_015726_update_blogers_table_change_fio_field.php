<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateBlogersTableChangeFioField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ('fio' !== 'fio') {
            Schema::table('blogers', function (Blueprint $table) {
                $table->renameColumn('fio', 'fio');
            });
        }

        Schema::table('blogers', function (Blueprint $table) {
            $table->string('fio', 191)->change();
            
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
