<?php

use App\Enums\EnumHelpers;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('api_calls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('fino_service_id')->constrained('fino_services')->onUpdate('cascade')->onDelete('cascade');
            $table->text('token')->nullable();
            $table->string('duration')->nullable();
            $table->string('request_code_sent')->nullable();
            $table->string('response_code_received')->nullable();
            $table->string('amount')->nullable();
            $table->enum('status', array_keys(EnumHelpers::$FinoApiCallsStatusItemsEnum))->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_calls');
    }
};
