<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsertreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usertrees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('parent_id');
            $table->integer('parent_level');
            $table->tinyInteger('is_admin')->default(0);;
            $table->timestamps();
        });

        DB::table('usertrees')->insert([
            [
                'user_id' => 2,
                'parent_id' => 1,
                'parent_level' => 1,
                'is_admin' => 1,
            ],
            [
                'user_id' => 3,
                'parent_id' => 1,
                'parent_level' => 1,
                'is_admin' => 1,
            ],
            [
                'user_id' => 3,
                'parent_id' => 2,
                'parent_level' => 2,
                'is_admin' => 0,
            ],
            [
                'user_id' => 4,
                'parent_id' => 1,
                'parent_level' => 1,
                'is_admin' => 1,
            ],
            [
                'user_id' => 4,
                'parent_id' => 2,
                'parent_level' => 2,
                'is_admin' => 0,
            ],
            [
                'user_id' => 4,
                'parent_id' => 3,
                'parent_level' => 3,
                'is_admin' => 0,
            ],
            [
                'user_id' => 5,
                'parent_id' => 1,
                'parent_level' => 1,
                'is_admin' => 1,
            ],
            [
                'user_id' => 5,
                'parent_id' => 2,
                'parent_level' => 2,
                'is_admin' => 0,
            ],
            [
                'user_id' => 5,
                'parent_id' => 3,
                'parent_level' => 3,
                'is_admin' => 0,
            ],
            [
                'user_id' => 5,
                'parent_id' => 4,
                'parent_level' => 4,
                'is_admin' => 0,
            ],
            [
                'user_id' => 6,
                'parent_id' => 1,
                'parent_level' => 1,
                'is_admin' => 1,
            ],
            [
                'user_id' => 6,
                'parent_id' => 2,
                'parent_level' => 2,
                'is_admin' => 0,
            ],
            [
                'user_id' => 6,
                'parent_id' => 3,
                'parent_level' => 3,
                'is_admin' => 0,
            ],
            [
                'user_id' => 6,
                'parent_id' => 4,
                'parent_level' => 4,
                'is_admin' => 0,
            ],
            [
                'user_id' => 6,
                'parent_id' => 5,
                'parent_level' => 5,
                'is_admin' => 0,
            ],
            [
                'user_id' => 7,
                'parent_id' => 1,
                'parent_level' => 1,
                'is_admin' => 1,
            ],
            [
                'user_id' => 7,
                'parent_id' => 3,
                'parent_level' => 3,
                'is_admin' => 0,
            ],
            [
                'user_id' => 7,
                'parent_id' => 4,
                'parent_level' => 4,
                'is_admin' => 0,
            ],
            [
                'user_id' => 7,
                'parent_id' => 5,
                'parent_level' => 5,
                'is_admin' => 0,
            ],
            [
                'user_id' => 7,
                'parent_id' => 6,
                'parent_level' => 6,
                'is_admin' => 0,
            ],
            [
                'user_id' => 8,
                'parent_id' => 1,
                'parent_level' => 1,
                'is_admin' => 1,
            ],
            [
                'user_id' => 8,
                'parent_id' => 4,
                'parent_level' => 2,
                'is_admin' => 0,
            ],
            [
                'user_id' => 8,
                'parent_id' => 5,
                'parent_level' => 3,
                'is_admin' => 0,
            ],
            [
                'user_id' => 8,
                'parent_id' => 6,
                'parent_level' => 4,
                'is_admin' => 0,
            ],
            [
                'user_id' => 8,
                'parent_id' => 7,
                'parent_level' => 5,
                'is_admin' => 0,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usertrees');
    }
}
