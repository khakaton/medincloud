<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateParserBloggersTableInsertTelegramAccountField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parser_bloggers', function (Blueprint $table) {
            $table->string('telegram_account', 191)->nullable();
            
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
