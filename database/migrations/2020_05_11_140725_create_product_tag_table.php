<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTagTable extends Migration
{
    public function up()
    {
        Schema::create('product_tag', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('tag_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_tag');
    }
}
