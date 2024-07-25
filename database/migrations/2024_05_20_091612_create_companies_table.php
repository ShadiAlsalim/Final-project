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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();

            $table->string('mobile_number')->nullable();
            // $table->integer('company_email')->nullable();  
            $table->string('website')->nullable();
            // $table->string('photod')->nullable();  
            $table->string('description')->nullable();
            $table->string('address')->nullable();
            // $table->foreignId('city_id')->nullable()->cascadeOnDelete(); 
            $table->foreignId('job_idustry_id')->nullable()->cascadeOnDelete();
            $table->boolean('approved')->nullable();
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();
            $table->string('email')->nullable();
            $table->foreignId('user_id')->constrained('users')->nullable()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }

};
