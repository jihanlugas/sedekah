<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsCompleteToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('requested_by')->after('remember_token');
            $table->enum('is_complete', [0,1])->after('requested_by');
            $table->string('invitation_code', 255)->after('is_complete')->unique()->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('requested_by');
            $table->dropColumn('is_complete');
            $table->dropColumn('invitation_code');
        });
    }
}
