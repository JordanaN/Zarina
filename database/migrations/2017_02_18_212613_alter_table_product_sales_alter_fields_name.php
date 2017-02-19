<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableProductSalesAlterFieldsName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('product_sales', function (Blueprint $table){
            $table->renameColumn('id_product', 'product_id');
            $table->renameColumn('id_packaging', 'packaging_id');
            $table->renameColumn('id_freight', 'freight_id');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_sales');        
    }
}
