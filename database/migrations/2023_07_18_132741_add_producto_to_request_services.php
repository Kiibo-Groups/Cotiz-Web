<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductoToRequestServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request_services', function (Blueprint $table) {
            $table->string('nombre')->nullable()->after('tipo');
            $table->string('modelo')->nullable()->after('nombre');
            $table->string('marca')->nullable()->after('modelo');
            $table->string('cantidad')->nullable()->after('marca');
            $table->string('presupuesto')->nullable()->after('cantidad');
            $table->string('servicio')->nullable()->after('presupuesto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('request_services', function (Blueprint $table) {
            //
        });
    }
}
