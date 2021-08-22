<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateEventsTableChangeDateField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ('date' !== 'date') {
            Schema::table('events', function (Blueprint $table) {
                $table->renameColumn('date', 'date');
            });
        }

        Schema::table('events', function (Blueprint $table) {
            $table->date('date')->nullable()->change();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {

        });
    }
}
