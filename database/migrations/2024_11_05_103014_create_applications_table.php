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
            $table->enum('typeofapplication', ['type1', 'type2', 'type3'])->nullable();
            $table->string('typeofbussiness', 255)->default('');
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('dtisecreg', 255)->nullable();
            $table->string('tin', 255)->nullable();
            $table->string('tradename', 255)->nullable();
            $table->string('bldgno', 255)->nullable();
            $table->string('namebldg', 255)->nullable();
            $table->string('lotno', 255)->nullable();
            $table->string('blockno', 255)->nullable();
            $table->string('street', 255)->nullable();
            $table->string('subdivision', 255)->nullable();
            $table->string('barangay', 255)->nullable();
            $table->string('district', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('province', 255)->nullable();
            $table->string('zipcode', 20)->nullable();
            $table->string('telno', 255)->nullable();
            $table->string('mobileno', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->float('floorarea', 8)->nullable();
            $table->integer('bmale')->default(0);
            $table->integer('bfemale')->default(0);
            $table->string('rescity', 255)->nullable();
            $table->boolean('vantruck')->default(false);
            $table->boolean('motorcycle')->default(false);
            $table->string('bldgnob', 255)->nullable();
            $table->string('namebldgb', 255)->nullable();
            $table->string('lotnob', 255)->nullable();
            $table->string('blocknob', 255)->nullable();
            $table->string('streetb', 255)->nullable();
            $table->string('subdivisionb', 255)->nullable();
            $table->string('barangayb', 255)->nullable();
            $table->string('districtb', 255)->nullable();
            $table->string('cityb', 255)->nullable();
            $table->string('provinceb', 255)->nullable();
            $table->string('zipcodeb', 20)->nullable();
            $table->enum('owned', ['yes', 'no'])->default('no');
            $table->string('taxdecleration', 255)->nullable();
            $table->string('propertyid', 255)->nullable();
            $table->boolean('taxincentives')->default(false);
            $table->string('businessActivity', 255)->nullable();
            $table->text('othersInput')->nullable();
            $table->json('lineOfBusiness')->nullable();
            $table->json('psic')->nullable();
            $table->json('productsServices')->nullable();
            $table->json('noOfUnits')->nullable();
            $table->json('capitalization')->nullable();
            $table->json('grossSales')->nullable();
            $table->boolean('declaration')->default(false);
            $table->string('dti')->nullable();
            $table->string('rhu')->nullable();
            $table->string('bfp')->nullable();
            $table->string('buildingpermit')->nullable();
            $table->string('pnp')->nullable();
            $table->string('zoningofficial')->nullable();
            $table->string('menro')->nullable();
            $table->string('treasureroffice')->nullable();
            $table->string('marketsup')->nullable();
            $table->string('mayoroffice')->nullable();
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
