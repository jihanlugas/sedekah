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
            $table->tinyInteger('is_complete')->default(0);
            $table->string('invitation_code', 255)->unique()->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'name' => 'Jihan Lugas',
                'email' => 'jihanlugas2@gmail.com',
                'password' => Hash::make('123456'),
                'requested_by' => 1,
                'is_complete' => 1,
                'invitation_code' => 1,

            ],
            [
                'name' => 'Madina Milatil Arta',
                'email' => 'madinamilatilarta@gmail.com',
                'password' => Hash::make('123456'),
                'requested_by' => 1,
                'is_complete' => 1,
                'invitation_code' => 2,
            ],
            [
                'name' => 'Lintar Yogi',
                'email' => 'lintaryogi@gmail.com',
                'password' => Hash::make('123456'),
                'requested_by' => 2,
                'is_complete' => 1,
                'invitation_code' => 3,
            ],
            [
                'name' => 'Aktony Seni',
                'email' => 'aktonyseni@gmail.com',
                'password' => Hash::make('123456'),
                'requested_by' => 3,
                'is_complete' => 1,
                'invitation_code' => 4,
            ],
            [
                'name' => 'Farhan',
                'email' => 'farhan@gmail.com',
                'password' => Hash::make('123456'),
                'requested_by' => 4,
                'is_complete' => 1,
                'invitation_code' => 5,
            ],
            [
                'name' => 'Nayla',
                'email' => 'nayla@gmail.com',
                'password' => Hash::make('123456'),
                'requested_by' => 5,
                'is_complete' => 1,
                'invitation_code' => 6,
            ],
            [
                'name' => 'Agus',
                'email' => 'agus@gmail.com',
                'password' => Hash::make('123456'),
                'requested_by' => 6,
                'is_complete' => 1,
                'invitation_code' => 7,
            ],
            [
                'name' => 'helda',
                'email' => 'helda@gmail.com',
                'password' => Hash::make('123456'),
                'requested_by' => 7,
                'is_complete' => 1,
                'invitation_code' => 8,
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
