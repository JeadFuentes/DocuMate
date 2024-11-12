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
        Schema::create('business_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applications_id')->constrained()->onDelete('cascade');
            $table->string('line_of_business');
            $table->string('psic');
            $table->string('products_services');
            $table->integer('no_of_units');
            $table->decimal('capitalization', 15, 2)->nullable();
            $table->decimal('gross_sales', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_information');
    }
};
