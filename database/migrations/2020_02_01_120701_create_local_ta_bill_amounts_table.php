<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalTaBillAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_ta_bill_amounts', function (Blueprint $table) {
            $table->bigIncrements('ids');
            $table->string('last_id');
            $table->text('local_tour_dt')->nullable();
            $table->text('mode_of_con_used')->nullable();
            $table->text('from_dt')->nullable();
            $table->text('to_dt')->nullable();
            $table->text('con_approx_km')->nullable();
            $table->text('con_amount')->nullable();
            $table->text('total_amount_pr_km')->nullable();
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
        Schema::dropIfExists('local_ta_bill_amounts');
    }
}
