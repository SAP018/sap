<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('Nombre del consumidor de agua');
            $table->string('email')->unique()->comment('correo del consumidor');
            $table->string('phone')->comment('telefeono del consumidor');
            $table->string('address',100)->comment('direccion del consumidor');
            $table->integer('num_medidor')->unique()->comment('para identificar el medididor');
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
        Schema::dropIfExists('customers');
    }
}
