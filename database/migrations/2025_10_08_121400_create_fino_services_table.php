<?php

use App\Enums\EnumHelpers;
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
        Schema::create('fino_services', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->enum('category', array_keys(EnumHelpers::$FinoServicesCategoryItemsEnum))->nullable();
            $table->text('description')->nullable();
            $table->text('icon_svg')->nullable();
            $table->string('price')->nullable();
            $table->string('respond_min_answer_time')->nullable();
            $table->text('api_link')->nullable();
            $table->text('api_guide_json')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fino_services');
    }
};
