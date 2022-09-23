<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNurseMoneyWithdrawlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nurse_money_withdrawls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->float('withdrawal_amount')->default(0);
            $table->float('request_amount')->default(0);
            $table->boolean('is_requested')->default(false);
            $table->string('txn_id')->nullable();
            $table->boolean('txn_status')->default(false);
            $table->boolean('request_status')->default(false);
            $table->dateTime('txn_date')->nullable();
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
        Schema::dropIfExists('nurse_money_withdrawls');
    }
}
