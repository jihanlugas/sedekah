<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('requested_by')->default(0);
            $table->enum('is_complete', [0, 1]);
            $table->string('invitation_code', 255)->unique()->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'name' => 'Jihan Lugas',
                'email' => 'jihanlugas2@gmail.com',
                'password' => Hash::make('123456'),

            ],
            [
                'name' => 'Madina Milatil Arta',
                'email' => 'madinamilatilarta@gmail.com',
                'password' => Hash::make('123456'),
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
        Schema::dropIfExists('users');
    }
}
