<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('job_id')->nullable();
            $table->string('total_amount')->nullable();
            $table->unsignedBigInteger('card_id')->nullable();
            $table->bigInteger('card_number')->nullable();
            $table->string('transaction_no')->nullable();
            $table->tinyInteger('transaction_for')->nullable()->comment('1:booking, 2:cancel charge');
            $table->tinyInteger('status')->comment('1:in progress, 2:completed, 3:failed')->default(1);
            $table->dateTime('payment_datetime')->nullable();
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
        Schema::dropIfExists('payment_details');
    }
}
