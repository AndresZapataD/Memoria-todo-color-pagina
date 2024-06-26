<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('files', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id')->nullable();
    
            // Si deseas agregar la restricción de clave foránea
            $table->foreign('user_id')->references('id')->on('data_users');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('files', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Elimina la clave foránea primero
            $table->dropColumn('user_id');
        });
    }    
};