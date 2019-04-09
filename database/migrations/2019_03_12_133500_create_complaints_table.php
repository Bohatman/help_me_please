<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->integer('issues_id');
            $table->tinyInteger('usertype');
            $table->integer('UID')->nullable();
            $table->integer('category_id');
            $table->integer('guest_id')->nullable();
            $table->string('PIC_ID')->default("-1");
            $table->string('RH_ID')->default("-1");
            $table->tinyInteger('status')->default(0);
            $table->ipAddress('IPv4');
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
        Schema::dropIfExists('complaints');
    }
}
