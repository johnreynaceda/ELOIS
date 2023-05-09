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
        Schema::create('deed_of_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
                  $table->foreignId('request_transaction_id');
             $table->string('vendor_name');
                $table->string('vendor_address');
                $table->string('vendee_name');
                $table->string('vendee_address');
                $table->string('amount');
                $table->string('make')->nullable();
                $table->string('mv_file_no')->nullable();
                    $table->string('engine_no')->nullable();
                    $table->string('classification')->nullable();
                        $table->string('type_of_body')->nullable();
                            $table->string('color')->nullable();
                                $table->string('chassis_no')->nullable();
                                    $table->string('plate')->nullable();
                                        $table->string('document_number')->nullable();
                                            $table->string('page_number')->nullable();
                                                $table->string('book_number')->nullable();
                                                    $table->string('series_of')->nullable();
                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deed_of_sales');
    }
};
