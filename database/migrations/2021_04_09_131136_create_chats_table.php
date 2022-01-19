<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
         $table->id();
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
            $table->string('category');
            $table->string('object');
            $table->longtext('message');
            $table->enum('priorirty', ['low', 'medium', 'high'])->default('medium');
            $table->enum('status', ['close', 'open'])->default('open');
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
        Schema::dropIfExists('chats');
    }
}
