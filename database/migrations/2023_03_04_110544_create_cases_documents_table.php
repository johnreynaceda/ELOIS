<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cases_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cases_folder_id');
            $table->string('name');
            $table->string('document_number');
            $table->string('page_number');
            $table->string('book_number');
            $table->string('series_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cases_documents');
    }
};
