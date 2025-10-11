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
        Schema::table('users', function (Blueprint $table) {
            $table->string('company_name')->nullable();
            $table->string('economic_code')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('registration_date')->nullable();
            $table->text('image_of_the_statute')->nullable();
            $table->text('newspaper_image')->nullable();
            $table->text('CEO_id_card_image')->nullable();
            $table->text('CEO_national_id_card_image')->nullable();
            $table->text('cover_letter_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'father_name',
                'bank_card_number',
                'bank_account_number',
                'bank_name',
                'bank_branch',
                'emergency_contact_name',
                'emergency_contact_phone',
                'description'
            ]);
        });
    }
};
