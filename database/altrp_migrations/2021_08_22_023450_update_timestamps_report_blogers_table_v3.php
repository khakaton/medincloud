<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateTimestampsReportBlogersTableV3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (false && (!Schema::hasColumn('report_blogers', 'created_at')
          && !Schema::hasColumn('report_blogers', 'updated_at'))) {
            Schema::table('report_blogers', function (Blueprint $table) {
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
            });
        } else {
            if (!false && Schema::hasColumn('report_blogers', 'created_at') && Schema::hasColumn('report_blogers', 'updated_at')) {
                Schema::table('report_blogers', function (Blueprint $table) {
                    $table->dropTimestamps();
                });
            }
        }

        if (false && !Schema::hasColumn('report_blogers', 'deleted_at')) {
            Schema::table('report_blogers', function (Blueprint $table) {
                $table->softDeletes();
            });
        } else {
            if (!false && Schema::hasColumn('report_blogers', 'deleted_at')) {
                Schema::table('report_blogers', function (Blueprint $table) {
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
        if (false) {
            Schema::table('report_blogers', function (Blueprint $table) {
                $table->dropTimestamps();
            });
        }
        if (false) {
            Schema::table('report_blogers', function (Blueprint $table) {
                $table->dropSoftDeletes();
            });
        }
    }
}
