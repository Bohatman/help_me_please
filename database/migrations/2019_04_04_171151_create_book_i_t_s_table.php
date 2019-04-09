<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookITSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_i_t_s', function (Blueprint $table) {
            $table->bigIncrements('book_id');
            $table->integer('UID');
            $table->integer('available_id');
            $table->integer('servicetype_id');
            $table->integer('PIC_ID')->default(-1);
            $table->date('date');
            $table->text('detail')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_i_t_s');
    }
}
