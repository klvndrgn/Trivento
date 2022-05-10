<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_item', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->string('item_category');
            $table->string('item_model');
            $table->string('item_brand');
            $table->string('item_image')->nullable();
            $table->text('item_remark')->nullable();
            $table->integer('item_quantity');
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
        Schema::dropIfExists('t_item');
    }
}
