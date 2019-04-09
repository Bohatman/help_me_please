<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->Increments('position_id');
            $table->tinyInteger('category_id');
            $table->tinyInteger('priority_level');
            $table->string('position_name');
            $table->timestamps();
        });
        DB::table('positions')->insert(
            array(
                'category_id' => 0,
                'priority_level' => 1,
                'position_name' => "IT Clinic",
            )
        );
        DB::statement("UPDATE `positions` SET `position_id` = '0', `created_at` = NULL, `updated_at` = NULL WHERE `positions`.`position_id` = 1;");
        DB::statement('ALTER TABLE positions AUTO_INCREMENT = 1;');
        DB::table('positions')->insert(
            array(
                'category_id' => 1,
                'priority_level' => 1,
                'position_name' => "หัวหน้า",
            )
        );
        DB::table('positions')->insert(
            array(
                'category_id' => 1,
                'priority_level' => 2,
                'position_name' => "ผู้ดูแลทั่วไป",
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
        Schema::dropIfExists('positions');
    }
}
