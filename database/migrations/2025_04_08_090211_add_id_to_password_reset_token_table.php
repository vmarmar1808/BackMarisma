<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('password_reset_token', function (Blueprint $table) {
            // Elimina la clave primaria existente
            $table->dropPrimary(['email', 'token']); // Si la clave primaria es compuesta
            // $table->dropPrimary('email'); // Si la clave primaria es solo 'email'
            // Añade la nueva clave primaria 'id'
            $table->id();
            $table->index('email');
        });
    }

    public function down()
    {
        Schema::table('password_reset_token', function (Blueprint $table) {
            $table->dropColumn('id');
        });
    }
};
