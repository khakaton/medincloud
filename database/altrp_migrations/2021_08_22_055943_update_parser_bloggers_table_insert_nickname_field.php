<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateParserBloggersTableInsertNicknameField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parser_bloggers', function (Blueprint $table) {
            $table->string('nickname', 191)->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parser_bloggers', function (Blueprint $table) {
            
        });
    }
}
