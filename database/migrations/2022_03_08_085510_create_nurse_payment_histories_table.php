<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNursePaymentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nurse_payment_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('job_id')->nullable()->constrained()->onDelete('cascade');
            $table->float('amount')->default(0);
            $table->tinyInteger('cr_dr')->nullable()->comment('1:credit, 2:debit');
            $table->tinyInteger('transaction_for')->nullable()->comment('1:booking, 2:cancel charge, 3:admin transfer');
            $table->tinyInteger('is_payment_done')->comment('0:pending, 1:completed')->default(0);
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
        Schema::dropIfExists('nurse_payment_histories');
    }
}
