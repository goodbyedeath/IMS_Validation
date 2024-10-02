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
        Schema::create('client_databases', function (Blueprint $table) {
            $table->id();
            $table->string('entitas_usaha')->nullable();
            $table->string('no_sertifikat')->nullable();
            $table->text('ruang_lingkup')->nullable();
            $table->text('alamat')->nullable();
            $table->string('standar')->nullable();
            $table->string('status_organisasi')->nullable();
            $table->date('masa_berlaku')->nullable();
            $table->date('audit_awal')->nullable();
            $table->date('pengawasan_audit_1')->nullable();
            $table->date('pengawasan_audit_2')->nullable();
            $table->string('status_pengawasan_1')->nullable();
            $table->string('status_pengawasan_2')->nullable();
            $table->date('perpanjangan')->nullable();
            $table->string('qr_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
