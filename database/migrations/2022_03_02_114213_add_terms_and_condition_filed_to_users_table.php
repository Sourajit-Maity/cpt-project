<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTermsAndConditionFiledToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('lpn')->after('licence_number')->nullable();
            $table->string('can')->after('lpn')->nullable();
            $table->string('security_question')->after('can')->nullable();
            $table->string('security_answer')->after('security_question')->nullable();
            $table->enum('terms_and_condiction_1', [0, 1])->default(0)->after('remember_token')->nullable();
            $table->enum('terms_and_condiction_2', [0, 1])->default(0)->after('terms_and_condiction_1')->nullable();
            $table->enum('terms_and_condiction_3', [0, 1])->default(0)->after('terms_and_condiction_2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('terms_and_condiction_1');
            $table->dropColumn('terms_and_condiction_2');
            $table->dropColumn('terms_and_condiction_3');
            $table->dropColumn('security_question');
            $table->dropColumn('security_answer');
            $table->dropColumn('lpn');
            $table->dropColumn('can');
        });
    }
}
