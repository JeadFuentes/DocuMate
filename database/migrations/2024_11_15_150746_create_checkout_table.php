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
        Schema::create('checkout', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applications_id')->constrained()->onDelete('cascade');
            $table->string('productname');
            $table->integer('amount');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('address');
            $table->string('town');
            $table->string('city');
            $table->string('country');
            $table->string('zip');
            $table->string('paymentmethod');
            $table->string('namecard');
            $table->string('acctnumber');
            $table->string('expiration')->nullable();
            $table->string('ccv')->nullable();
            $table->string('invoiceno');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkout');
    }
};
