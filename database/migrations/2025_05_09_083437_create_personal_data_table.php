<?php

use App\Models\{Customer, Employee};
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
        Schema::create('personal_data', function (Blueprint $table) {
            $table->uuid('uuid')->unique(); 
            $table->string('fullname');
            $table->date('birthday');
            $table->string('phone_number',20);
            $table->string('address');
            $table->uuid('customer_uuid')->nullable();
            $table->uuid('employee_uuid')->nullable();
            $table->foreign('customer_uuid')->references('uuid')->on('customers');
            $table->foreign('employee_uuid')->references('uuid')->on('employees');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_data');
    }
};
