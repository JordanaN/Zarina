<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatererPackagingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caterer_packaging', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('caterer_id')->unsigned();
            $table->integer('packaging_id')->unsigned();
            $table->timestamps();

            $table->foreign('caterer_id')->references('id')->on('caterers')->onDelete('cascade');
            $table->foreign('packaging_id')->references('id')->on('packagings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caterer_packaging');  
        
    }
}
