<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRfcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rfcs', function (Blueprint $table) {
            $table->id();
            $table->string('rfc')->nullable();
            $table->string('nombre')->nullable();
            $table->string('opinionPositiva')->nullable();
            $table->string('infoBancaria')->nullable();
            $table->string('constFiscal')->nullable();
            $table->string('domicilioFiscal')->nullable();
            $table->string('numeroPlanta')->nullable();
            $table->string('calle')->nullable();
            $table->string('numeroCalle')->nullable();
            $table->string('colonia')->nullable();
            $table->string('cp')->nullable();
            $table->string('municipio')->nullable();
            $table->string('delegación')->nullable();
            $table->string('estado')->nullable();
            $table->string('pais')->nullable();
            $table->longText('actividadPPal')->nullable();
            $table->boolean('status')->default('1');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rfcs');
    }
}
