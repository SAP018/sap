<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('readings', function (Blueprint $table) {
            $table->increments('id');
            //llave foranea de los usuarios del sistema
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            //llave foranea de los clientes del sistema
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');
            //llave foranea de los plazos

            //llave foranea de los periodos
            $table->integer('period_id')->unsigned();
            $table->foreign('period_id')->references('id')->on('periods');
            $table->decimal('medida', 10, 2);
            $table->decimal('monto', 15, 2);
            $table->decimal('recargo', 10, 2)->nullable();
            $table->biginteger('month')->nullable();
            $table->enum('estatus', ['1', '2','3'])->default('1')->comment('1= sinpagar 2=pagado');
           

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
        Schema::dropIfExists('readings');
    }
}
