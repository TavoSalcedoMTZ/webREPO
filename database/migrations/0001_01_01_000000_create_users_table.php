<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Primero crea la tabla users
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // clave primaria
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });

        // Luego crea la tabla posts que depende de users
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('content');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        // Primero elimina posts (depende de users)
        Schema::dropIfExists('posts');
        Schema::dropIfExists('users');
    }
};
