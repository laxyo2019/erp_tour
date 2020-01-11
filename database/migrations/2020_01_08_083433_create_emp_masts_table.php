<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpMastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_masts', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedInteger('user_id')->nullable();
          $table->unsignedInteger('parent_id')->nullable();
          $table->string('emp_code', 15)->nullable();
          $table->unsignedInteger('comp_id')->nullable();
          $table->unsignedInteger('dept_id')->nullable();
          $table->unsignedInteger('desg_id')->nullable();
          $table->unsignedInteger('grade_id')->nullable();
          $table->string('emp_name', 50);
          $table->string('emp_img', 200)->default('emp_default_image.png');
          $table->enum('emp_gender', ['M', 'F', 'O'])->nullable();
          $table->date('emp_dob')->nullable();
          $table->text('curr_addr')->nullable();
          $table->text('perm_addr')->nullable();
          $table->string('blood_grp',3)->nullable();
          $table->string('contact', 50)->nullable();
          $table->string('alt_contact', 50)->nullable();
          $table->string('email', 50)->nullable();
          $table->string('password',50)->nullable();
          $table->string('alt_email', 50)->nullable();
          $table->string('driv_lic', 20)->nullable();
          $table->string('aadhar_no', 20)->nullable();
          $table->string('voter_id', 20)->nullable();
          $table->string('pan_no', 20)->nullable();
          $table->unsignedInteger('emp_type')->nullable();
          $table->unsignedInteger('emp_status')->nullable();
          $table->string('old_uan', 20)->nullable();
          $table->string('curr_uan', 20)->nullable();
          $table->string('old_pf', 20)->nullable();
          $table->string('curr_pf', 20)->nullable();
          $table->string('old_esi', 20)->nullable();
          $table->string('curr_esi', 20)->nullable();
          $table->date('join_dt')->nullable();
          $table->date('leave_dt')->nullable();
          $table->integer('active')->default(1);
          $table->integer('leave_allotted')->nullable();
          $table->timestamps();
          $table->softDeletes();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emp_masts');
    }
}
