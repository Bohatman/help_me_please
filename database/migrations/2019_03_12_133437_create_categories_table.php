<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->tinyIncrements('category_id');
            $table->string('category_name');
            $table->string('category_color')->default('default');
            $table->timestamps();
        });
        DB::table('categories')->insert(
            array(
                'category_name' => "It Clinic",
            )
        );
        DB::statement("UPDATE `categories` SET `category_id` = '0', `created_at` = NULL, `updated_at` = NULL WHERE `categories`.`category_id` = 1;");
        DB::statement('ALTER TABLE categories AUTO_INCREMENT = 1;');
        DB::table('categories')->insert(
            array(
                'category_name' => "เรื่องทั่วไป",
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
        Schema::dropIfExists('categories');
    }
}
