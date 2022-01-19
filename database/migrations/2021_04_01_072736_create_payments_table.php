<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inquiry_id')->constrained('inquiries')->onDelete('cascade');
            $table->foreignId('student_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('date_from')->nullable();
            $table->string('date_to')->nullable();
            $table->string('amount')->nullable();
            $table->string('receipt')->nullable();
            $table->string('pay_date')->nullable();
            $table->enum('status',['pending','confirmed','due'])->default('due');
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
        Schema::dropIfExists('payments');
    }
}
