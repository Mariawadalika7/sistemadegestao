<?php

use App\Models\Enterprise;
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
        Schema::create('enterprise_services', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->string('service_name');
            $table->decimal('service_price',10,2);
            $table->uuid('enterprise_uuid');
            $table->foreign('enterprise_uuid')->references('uuid')->on('enterprises');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enterprise_services');
    }
};
