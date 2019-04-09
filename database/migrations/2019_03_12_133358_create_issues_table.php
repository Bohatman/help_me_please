<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->Increments('issues_id');
            $table->tinyInteger('category_id');
            $table->tinyInteger('sub_category_id');
            $table->text('detail');
            $table->tinyInteger('campus_id');
            //additional
            $table->string('building')->default("-1");
            $table->string('room')->default("-1");
            $table->string('picture')->default('-1');
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
        Schema::dropIfExists('issues');
    }
}
