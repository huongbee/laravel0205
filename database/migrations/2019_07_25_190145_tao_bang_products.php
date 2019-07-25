<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaoBangProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products',function($t){
            $t->bigIncrements('id');
            $t->unsignedBigInteger('type_id');
            $t->string('name', 100);
            $t->double('price')->default(0);
            $t->text('description')->nullable();
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
// $t->foreign('type_id')->references('id')->on('type_products');
// products_type_id_foreign