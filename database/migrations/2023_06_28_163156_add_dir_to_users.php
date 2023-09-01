<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDirToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //

            $table->string('calle')->nullable()->after('country');
            $table->string('numeroCalle')->nullable()->after('calle');
            $table->string('colonia')->nullable()->after('numeroCalle');
            $table->string('cp')->nullable()->after('colonia');
            $table->string('municipio')->nullable()->after('cp');
            $table->string('delegación')->nullable()->after('municipio');
            $table->string('estado')->nullable()->after('delegación');

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
