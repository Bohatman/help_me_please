<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campuses', function (Blueprint $table) {
            $table->Increments('campus_id');
            $table->String('campus_name');
            $table->timestamps();
        });
        DB::table('campuses')->insert(
            array(
                'campus_name' => "ไม่มีปรากฎวิทยาเขต",
            )
        );
        DB::statement("UPDATE `campuses` SET `campus_id` = '0', `created_at` = NULL, `updated_at` = NULL WHERE `campuses`.`campus_id` = 1;");
        DB::statement('ALTER TABLE campuses AUTO_INCREMENT = 1;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campuses');
    }
}
