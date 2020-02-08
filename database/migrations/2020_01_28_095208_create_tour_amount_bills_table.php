<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourAmountBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_tour_amount_bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('ta_no')->nullable();
            $table->string('bill_no')->nullable();
            $table->string('time_from');
            $table->string('time_to');
            $table->string('grd')->nullable();
            $table->string('designation')->nullable();
            $table->string('tour_from')->nullable();
            $table->string('tour_to')->nullable();

            $table->string('total_fare_details')->nullable();
            $table->string('total_fare_amount')->nullable();
            $table->string('daily_allowance_day')->nullable();
            $table->string('daily_allowance_amonut')->nullable();
            $table->string('metropolitan')->nullable();
            $table->string('metropolitan_amonut')->nullable();
            $table->string('daily_allownce_details')->nullable();
            $table->string('daily_allownce_amount')->nullable();
            $table->string('other_localities')->nullable();
            $table->string('other_localities_amount')->nullable();
            $table->string('conveyance_chages_detail')->nullable();
            $table->string('conveyance_chages_amount')->nullable();
            $table->string('other_charge_detail')->nullable();
            $table->string('other_charge_amount')->nullable();
            $table->string('less_advance_time')->nullable();
            $table->string('less_advance_amount')->nullable();
            $table->string('due_blance_time')->nullable();
            $table->string('due_amount')->nullable();
            $table->text('bills')->nullable();
            $table->string('level1_status')->default('0');
            $table->string('level2_status')->default('0');
            $table->string('manager_status')->default('0');
            $table->text('request')->nullable();
            $table->string('status')->default('0');
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
        Schema::dropIfExists('tour_tour_amount_bills');
    }
}
