<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UecStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uec_student', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_code'); //Mã sinh viên
            $table->string('student_name'); //Họ tên sinh viên
            $table->string('student_slug'); //ho-ten-sinh-vien
            $table->string('student_img')->nullable(); //Ảnh đại diện
            $table->date('student_birthday')->nullable(); //Ngày sinh
            $table->tinyInteger('student_gender')->nullable(); //Giới tính
            $table->string('student_phone')->nullable(); //Số điện thoại
            $table->string('student_email')->nullable(); //Email
            $table->string('student_head_teacher')->nullable(); //Giáo viên chủ nhiệm
            $table->string('student_address')->nullable(); //Địa chỉ hiện tại
            $table->string('student_home_town')->nullable(); //Quê quán


            $table->string('student_employment_status')->nullable(); //tình trạng việc làm
            $table->string('student_employment_name')->nullable(); //Tên việc làm
            $table->string('student_company_name')->nullable(); // Tên công ty
            $table->string('student_company_address')->nullable(); //Thời gian làm việc
            $table->string('student_timeserving')->nullable(); //Thời gian làm việc

            $table->boolean('student_tick')->nullable(); //Chọn
            $table->tinyInteger('student_status')->nullable(); //Trạng thái
            
            $table->integer('class_id')->unsigned()->nullable(); // Lớp
            $table->integer('specialize_id')->unsigned()->nullable(); // Chuyên ngành
            $table->integer('science_id')->unsigned()->nullable(); // Khoa
            $table->integer('course_id')->unsigned()->nullable(); // Khóa học
            $table->integer('area_id')->unsigned()->nullable(); // Khu vực
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
        Schema::dropIfExists('uec_student');
    }
}
