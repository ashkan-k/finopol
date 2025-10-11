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
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name')->nullable();
            $table->string('national_code')->nullable();
            $table->string('website')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('address')->nullable();
            $table->date('birth_date')->nullable();
            $table->text('national_card_image')->nullable();
            $table->enum('shahkar_inquiry_status', array_keys(EnumHelpers::$ShahkarInquiryStatusEnum))->default('waiting');
            $table->enum('status', array_keys(EnumHelpers::$UserStatusEnum))->default('waiting');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'national_code',
                'birth_date',
                'father_name',
                'address',
                'postal_code',
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
