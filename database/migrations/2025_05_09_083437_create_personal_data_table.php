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
            $table->foreignIdFor(Employee::class)->nullable();
            $table->foreignIdFor(Customer::class)->nullable();
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
