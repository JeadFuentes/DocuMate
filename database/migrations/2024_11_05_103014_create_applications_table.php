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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            // General Information
            $table->integer('user_id');
            $table->string('typeofapplication')->nullable();
            $table->string('typeofbussiness')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('dtisecreg')->nullable();
            $table->string('tin')->nullable();
            $table->string('tradename')->nullable();
            $table->string('telno')->nullable();
            $table->string('mobileno')->nullable();
            $table->string('email')->nullable();
            $table->string('surname')->nullable();
            $table->string('givenname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('suffix')->nullable();
            $table->string('corp')->nullable();
            $table->integer('floorarea')->nullable();
            $table->integer('bmale')->default(0);
            $table->integer('bfemale')->default(0);
            $table->string('rescity')->nullable();
            $table->integer('vantruck')->default(0);
            $table->integer('motorcycle')->default(0);
            $table->string('owned')->nullable();
            $table->string('taxdecleration')->nullable();
            $table->string('propertyid')->nullable();
            $table->string('taxincentives')->nullable();
            $table->string('businessActivity')->nullable();
            $table->string('othersInput')->nullable();
            
            // Primary Address
            $table->string('bldgno')->nullable();
            $table->string('namebldg')->nullable();
            $table->string('lotno')->nullable();
            $table->string('blockno')->nullable();
            $table->string('street')->nullable();
            $table->string('subdivision')->nullable();
            $table->string('barangay')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('zipcode')->nullable();
            
            // Secondary Address
            $table->string('bldgnob')->nullable();
            $table->string('namebldgb')->nullable();
            $table->string('lotnob')->nullable();
            $table->string('blocknob')->nullable();
            $table->string('streetb')->nullable();
            $table->string('subdivisionb')->nullable();
            $table->string('barangayb')->nullable();
            $table->string('districtb')->nullable();
            $table->string('cityb')->nullable();
            $table->string('provinceb')->nullable();
            $table->string('zipcodeb')->nullable();
            $table->string('status')->nullable();
            $table->string('remarks')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
