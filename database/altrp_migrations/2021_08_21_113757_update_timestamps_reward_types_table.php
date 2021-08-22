<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateTimestampsRewardTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (1 && (!Schema::hasColumn('reward_types', 'created_at')
          && !Schema::hasColumn('reward_types', 'updated_at'))) {
            Schema::table('reward_types', function (Blueprint $table) {
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
            });
        } else {
            if (!1 && Schema::hasColumn('reward_types', 'created_at') && Schema::hasColumn('reward_types', 'updated_at')) {
                Schema::table('reward_types', function (Blueprint $table) {
                    $table->dropTimestamps();
                });
            }
        }

        if (false && !Schema::hasColumn('reward_types', 'deleted_at')) {
            Schema::table('reward_types', function (Blueprint $table) {
                $table->softDeletes();
            });
        } else {
            if (!false && Schema::hasColumn('reward_types', 'deleted_at')) {
                Schema::table('reward_types', function (Blueprint $table) {
                    $table->dropSoftDeletes();
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (1) {
            Schema::table('reward_types', function (Blueprint $table) {
                $table->dropTimestamps();
            });
        }
        if (false) {
            Schema::table('reward_types', function (Blueprint $table) {
                $table->dropSoftDeletes();
            });
        }
    }
}
