<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProveToRfcs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rfcs', function (Blueprint $table) {
            $table->string('constanciaPositiva')->nullable()->after('numeroPlanta');
            $table->string('cartaAceptacion')->nullable()->after('constanciaPositiva');
            $table->string('listadoProductos')->nullable()->after('cartaAceptacion');
            $table->string('telefono')->nullable()->after('listadoProductos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rfcs', function (Blueprint $table) {
            //
        });
    }
}
