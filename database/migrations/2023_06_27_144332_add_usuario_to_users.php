<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsuarioToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('areaEmpresa')->nullable()->after('job');
            $table->string('telefonoEmpresa')->nullable()->after('areaEmpresa');
            $table->string('fotoGafete')->nullable()->after('telefonoEmpresa');
            $table->string('fotoCredencial')->nullable()->after('fotoGafete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
