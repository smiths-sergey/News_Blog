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
        Schema::create('s3_files', function (Blueprint $table) {
            $table->comment('Файлы S3');
            $table->id();

            $table->string('sha256', 64)->index()->comment('Хэш файла. Он же уникальный ключ в хранилище S3');
            $table->string('file_name')->nullable()->index();
            $table->string('mime_type');


            $table->timestamps();
            $table->softDeletes();
            $table->unique(['sha256', 'file_name']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s3_files');
    }
};
