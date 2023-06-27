<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRolToRfcs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rfcs', function (Blueprint $table) {
            $table->boolean('rol')->default('1')->after('id'); // rol =1 - Empresa,  rol=2 -> Proveedores
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
