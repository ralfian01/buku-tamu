<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guest_books', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('full_name');
            $table->string('position'); // Jabatan
            $table->date('visit_date'); // Tanggal Berkunjung
            $table->string('institution'); // Asal Instansi
            $table->string('target_official'); // Pejabat yang dituju
            $table->text('purpose'); // Maksud Kedatangan
            $table->text('feedback'); // Pesan/Kesan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guest_books');
    }
};
