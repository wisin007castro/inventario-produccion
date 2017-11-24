<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idproductos')->unsigned();
            $table->index('idproductos');
            $table->foreign('idproductos')
                ->references('id')->on('productos')
                ->onDelete('cascade');
            $table->integer('unidades');
            $table->integer('precio');
            $table->string('detalle');
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
        Schema::Drop('ventas');
    }
}
