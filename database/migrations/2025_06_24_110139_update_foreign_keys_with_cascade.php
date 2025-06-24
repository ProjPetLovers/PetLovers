<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // detalhes_usuario
        Schema::table('detalhes_usuario', function (Blueprint $table) {
            $table->dropForeign('detalhes_usuario_id_detalhes_usuario_foreign');
            $table->foreign('id_detalhes_usuario')->references('id')->on('users')->onDelete('cascade');
        });

        // pet
        Schema::table('pet', function (Blueprint $table) {
            $table->dropForeign('pet_ibfk_1');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
        });

        // conexao
        Schema::table('conexao', function (Blueprint $table) {
            $table->dropForeign('conexao_ibfk_1');
            $table->dropForeign('conexao_ibfk_2');
            $table->foreign('usuario1_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('usuario2_id')->references('id')->on('users')->onDelete('cascade');
        });

        // mensagem
        Schema::table('mensagem', function (Blueprint $table) {
            $table->dropForeign('mensagem_ibfk_2');
            $table->dropForeign('mensagem_ibfk_3');
            $table->foreign('destinatario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('remetente_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      // detalhes_usuario
        Schema::table('detalhes_usuario', function (Blueprint $table) {
            // Dropa a chave estrangeira com CASCADE que foi criada no 'up'
            $table->dropForeign(['id_detalhes_usuario']);
            // Recria a chave estrangeira sem onDelete('cascade'), voltando ao comportamento padrão (RESTRICT)
            $table->foreign('id_detalhes_usuario')->references('id')->on('users');
        });

        // pet
        Schema::table('pet', function (Blueprint $table) {
            // Dropa a chave estrangeira com CASCADE que foi criada no 'up'
            $table->dropForeign(['usuario_id']); 
            // Recria a chave estrangeira sem onDelete('cascade')
            $table->foreign('usuario_id')->references('id')->on('users');
        });

        // conexao
        Schema::table('conexao', function (Blueprint $table) {
            // Dropa as chaves estrangeiras com CASCADE que foram criadas no 'up'
            $table->dropForeign(['usuario1_id']); 
            $table->dropForeign(['usuario2_id']); 
            // Recria as chaves estrangeiras sem onDelete('cascade')
            $table->foreign('usuario1_id')->references('id')->on('users');
            $table->foreign('usuario2_id')->references('id')->on('users');
        });

        // mensagem
        Schema::table('mensagem', function (Blueprint $table) {
            // Dropa as chaves estrangeiras com CASCADE que foram criadas no 'up'
            $table->dropForeign(['destinatario_id']); 
            $table->dropForeign(['remetente_id']); 
            // Recria as chaves estrangeiras sem onDelete('cascade')
            $table->foreign('destinatario_id')->references('id')->on('users');
            $table->foreign('remetente_id')->references('id')->on('users');
        });
    }
};
