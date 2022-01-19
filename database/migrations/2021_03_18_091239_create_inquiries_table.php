<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
            $table->string('time_start')->nullable();
            $table->string('time_end')->nullable();
            $table->string('study_type')->nullable();
            $table->string('no_of_students')->nullable();
            $table->enum('status',['trial','pending','active','rejected','paused','cancel'])->default('pending');
            $table->longText('rejected_reason')->nullable();
            $table->unsignedBigInteger('tutor_id')->nullable();
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
        Schema::dropIfExists('inquiries');
    }
}
