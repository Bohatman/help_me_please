<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->Increments('UID');
            $table->string('password');
            $table->tinyInteger('usertype');
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->string('phone')->default(-1);
            $table->string('picture')->default('-1');
            $table->tinyInteger('position_id')->default(-1);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(
            array(
                'password' => Hash::make(env("ADMIN_PASSWORD", "admin")),
                'usertype' => 0,
                'fname' => env("ADMIN_FNAME", "admin"),
                'lname' => env("ADMIN_LNAME", "admin"),
                'email' => 'admin@admin',
                'position_id' => -1,
                'picture' => '/storage/profile/picture//cjBRlpfj3OY3sDOqhh1O2yqkuAWPUSAwEQ4hF36o.jpeg'
            )
        );
        DB::statement("UPDATE users SET UID = 0, created_at = NULL, updated_at = NULL WHERE users.UID = 1;");
        DB::statement('ALTER TABLE users AUTO_INCREMENT = 1;');
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
