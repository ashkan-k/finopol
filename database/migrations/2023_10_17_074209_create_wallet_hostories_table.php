<?php

use App\Enums\EnumHelpers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wallet_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('amount')->default(0);
            $table->enum('type', array_keys(EnumHelpers::$WalletHistoryTypesEnum));

//            $table->unsignedBigInteger('item_id');
//            $table->string('item_type');

//            $table->text('short_report')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallet_hostories');
    }
};
