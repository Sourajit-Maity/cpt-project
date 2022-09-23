<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNurseBankDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nurse_bank_details', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name')->nullable();
            $table->string('account_holder_name')->nullable();
            $table->string('routing_number')->nullable();
            $table->string('account_number')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('stripe_bank_id')->nullable();
            $table->string('additional_document')->nullable();
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
        Schema::dropIfExists('nurse_bank_details');
    }
}
