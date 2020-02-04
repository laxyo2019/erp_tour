<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurposeOfJournyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purpose_of_journy_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('last_id');
            $table->text('purpose_of_journy')->nullable();
            $table->text('departure_dt')->nullable();
            $table->text('departure_station')->nullable();
            $table->text('arrival_dt')->nullable();
            $table->text('arrival_station')->nullable();
            $table->text('class_by')->nullable();
            $table->text('fare_rs')->nullable();
            $table->text('ticket_no')->nullable();
            $table->text('remark')->nullable();
            $table->text('departure_tm')->nullable();
            $table->text('arrival_tm')->nullable();
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
        Schema::dropIfExists('purpose_of_journy_details');
    }
}
