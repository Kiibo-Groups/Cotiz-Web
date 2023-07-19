<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfesionalToServicesProviders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services_providers', function (Blueprint $table) {
            $table->string('nombre')->nullable()->after('logo');
            $table->string('apellidoPaterno')->nullable()->after('nombre');
            $table->string('apellidoMaterno')->nullable()->after('apellidoPaterno');
            $table->string('carrera')->nullable()->after('apellidoMaterno');
            $table->string('especialidad')->nullable()->after('carrera');
            $table->string('titulo1')->nullable()->after('especialidad');
            $table->string('titulo2')->nullable()->after('titulo1');
            $table->string('cedula1')->nullable()->after('titulo2');
            $table->string('cedula2')->nullable()->after('cedula1');
            $table->string('cv')->nullable()->after('cedula2');
            $table->string('fotoCredencial')->nullable()->after('cv');
            $table->string('fotoCredencial2')->nullable()->after('fotoCredencial');
            $table->string('calle')->nullable()->after('fotoCredencial2');
            $table->string('numeroCalle')->nullable()->after('calle');
            $table->string('colonia')->nullable()->after('numeroCalle');
            $table->string('cp')->nullable()->after('colonia');
            $table->string('municipio')->nullable()->after('cp');
            $table->string('delegación')->nullable()->after('municipio');
            $table->string('estado')->nullable()->after('delegación');
            $table->string('country')->nullable()->after('estado');
            $table->string('celular')->nullable()->after('country');
            $table->string('email')->nullable()->after('celular');
            $table->string('fb')->nullable()->after('email');
            $table->string('linkedin')->nullable()->after('fb');
            $table->string('instagram')->nullable()->after('linkedin');
            $table->string('exitos')->nullable()->after('instagram');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services_providers', function (Blueprint $table) {
            //
        });
    }
}
