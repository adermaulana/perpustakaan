<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->required();
            $table->string('penulis')->required();
            $table->string('isbn')->nullable()->unique();
            $table->text('deskripsi')->nullable();
            $table->foreignId('kategori_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->nullable();
            $table->integer('stok')->default(0);
            $table->string('penerbit')->nullable();
            $table->string('tahun_terbit')->nullable();
            $table->string('gambar')->nullable();
            $table->enum('status', ['tersedia', 'tidak tersedia'])->default('tersedia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
