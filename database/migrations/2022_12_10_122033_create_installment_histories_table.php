<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallmentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installment_histories', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_order');
            $table->string('price');
            $table->string('quantity');
            $table->string('total_month');
            $table->string('total_pay');
            $table->string('balance');
            $table->string('break_pay');
            $table->string('cash_pay');
            $table->string('penalty');
            $table->string('due_date');
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
        Schema::dropIfExists('installment_histories');
    }
}
