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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('role')->default('Customer'); // User role (Customer or Service-provider)
            $table->string('name'); // Full name
            $table->string('email')->unique(); // Email address (unique)
            $table->string('phone'); // Phone number
            $table->string('address'); // Address
            $table->string('password'); // Password (hashed)
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
