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
        Schema::create('entry', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('data_id');
            $table->foreign('data_id')->references('id')->on('data')->onDelete('cascade');
            $table->text('no_telp');
            $table->enum('status',['Dimiliki','Dijual','Rusak','Hilang','Meninggal','Pailit','Tidak Diketahui']);
            $table->text('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entry');
    }
};
