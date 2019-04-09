<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->Increments('guest_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->timestamps();
        });
        DB::table('guests')->insert(
            array(
                'fname' => 'ไม่มีข้อมูล',
                'lname' => 'ไม่มีข้อมูล',
                'email' => 'Nothing@nothing.com'
            )
        );

        DB::statement("UPDATE guests SET guest_id = 0, created_at = NULL, updated_at = NULL WHERE guests.guest_id = 1;");
        DB::statement('ALTER TABLE guests AUTO_INCREMENT = 1;');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guests');
    }
}
