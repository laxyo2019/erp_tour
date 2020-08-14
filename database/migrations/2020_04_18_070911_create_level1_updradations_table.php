<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevel1UpdradationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_level1_updradations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('tour_request_id')->nullable();
            $table->string('emp_name')->nullable();
            $table->string('grd')->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->string('tour_from')->nullable();
            $table->string('tour_to')->nullable();
            $table->string('time_from')->nullable();
            $table->string('time_to')->nullable();
            $table->text('purpuse_of_tour')->nullable();
            $table->string('mode_of_travel')->nullable();
            $table->string('entitlement')->nullable();
            $table->text('proposed_class')->nullable();
            $table->text('justification')->nullable();
            $table->text('exception_heigh_upgradaton')->nullable();
            $table->string('level1_status')->nullable();
            $table->string('level2_status')->nullable();
            $table->string('manager_status')->nullable();
            $table->string('emp_location')->nullable();
            $table->string('manager_response')->nullable();
            $table->string('admin_response')->nullable();
            $table->string('super_admin_response')->nullable();
            $table->unsignedInteger('status')->nullable();
            $table->softDeletes();

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
        Schema::dropIfExists('level1_updradations');
    }
}
