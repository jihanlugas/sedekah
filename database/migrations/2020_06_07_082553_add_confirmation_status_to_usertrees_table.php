<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConfirmationStatusToUsertreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usertrees', function (Blueprint $table) {
            $table->smallInteger('confirmation_status')->after('photo_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usertrees', function (Blueprint $table) {
            $table->dropColumn('confirmation_status');
        });
    }
}
