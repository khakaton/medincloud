<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateBlogersTableChangeNameField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ('name' !== 'name') {
            Schema::table('blogers', function (Blueprint $table) {
                $table->renameColumn('name', 'name');
            });
        }

        Schema::table('blogers', function (Blueprint $table) {
            $table->string('name', 191)->change();
            
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
