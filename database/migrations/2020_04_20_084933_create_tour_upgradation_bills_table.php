<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourUpgradationBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_upgradation_bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('ta_no')->nullable();
            $table->string('bill_no')->nullable();
            $table->string('tour_upgradation_from');
            $table->string('tour_upgradation_to');
            $table->string('tour_from')->nullable();
            $table->string('tour_to')->nullable();
            $table->string('grd')->nullable();
            $table->string('designation')->nullable();
            $table->text('bills')->nullable();

            
            $table->string('level1_status')->default('0');
            $table->string('level2_status')->default('0');
            $table->string('manager_status')->default('0');
            $table->string('accountant_status')->default('0');
            
            $table->string('emp_location')->nullable();
            $table->string('emp_department')->nullable();
            $table->string('admin_response')->nullable();
            $table->string('accountant_response')->nullable();
            $table->string('accountant_status_varied_bill')->nullable();
            $table->string('acct_bill_vari_res')->nullable();
            $table->string('acct_bill_discard_res')->nullable();
            $table->string('total_amount')->nullable();
            $table->text('tour_upgrade_justification')->nullable();
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
        Schema::dropIfExists('tour_upgradation_bills');
    }
}
