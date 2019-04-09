<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicetimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicetimes', function (Blueprint $table) {
            $table->Increments('available_id');
            $table->time('time_start');
            $table->time('time_end');
            $table->timestamps();
        });
        DB::table('servicetimes')->insert(
            array(
                'time_start' => "09:00:00",
                'time_end' => "10:00:00"
            )
        );
        DB::table('servicetimes')->insert(
            array(
                'time_start' => "10:00:00",
                'time_end' => "11:00:00"
            )
        );
        DB::table('servicetimes')->insert(
            array(
                'time_start' => "11:00:00",
                'time_end' => "12:00:00"
            )
        );
        DB::table('servicetimes')->insert(
            array(
                'time_start' => "13:00:00",
                'time_end' => "14:00:00"
            )
        );
        DB::table('servicetimes')->insert(
            array(
                'time_start' => "14:00:00",
                'time_end' => "15:00:00"
            )
        );
        DB::table('servicetimes')->insert(
            array(
                'time_start' => "15:00:00",
                'time_end' => "16:00:00"
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicetimes');
    }
}
