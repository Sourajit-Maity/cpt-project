<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->longText('additional_instructions')->nullable();
            $table->string('job_name')->nullable();
            $table->string('employee_required')->nullable();
            $table->string('hiring_budget')->nullable();
            $table->tinyInteger('urgent_requirement')->nullable()->comment('1:yes, 2:no');
            $table->dateTime('job_post_date')->nullable();


            $table->string('promo_code')->nullable();
            $table->float('discount_amount')->default(0);
            $table->float('reward_discount_amount')->default(0);
            $table->float('cancellation_charge')->default(0);
            $table->float('total_amount')->default(0);

            $table->tinyInteger('job_apply_status')->nullable()->comment('1:Received, 2:Job accepted');
            $table->tinyInteger('job_status')->nullable()->comment('1:Ongoing, 2:Upcoming, 3:Closed')->default(1);
            $table->tinyInteger('payment_status')->comment('1:in progres, 2:Completed, 3:failed')->default(1);
            $table->unsignedBigInteger('cancelled_by')->nullable();
            $table->foreign('cancelled_by')->references('id')->on('users')->onDelete('cascade');
            $table->string('cancellation_reason')->nullable();
            $table->longText('cancellation_comment')->nullable();
            $table->dateTime('cancelled_at')->nullable();
            $table->boolean('active')->default(false);
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
        Schema::dropIfExists('jobs');
    }
}
