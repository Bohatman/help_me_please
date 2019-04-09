<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicetypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicetypes', function (Blueprint $table) {
            $table->tinyIncrements('servicetype_id');
            $table->string('servicetype_name');
            $table->integer('servicetype_price');
            $table->tinyInteger('usertype');
            $table->timestamps();
        });
        DB::table('servicetypes')->insert(
            array(
                'servicetype_name' => "บริการให้คำปรึกษา",
                'servicetype_price' => "150",
                'usertype' => 1
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
        Schema::dropIfExists('servicetypes');
    }
}
