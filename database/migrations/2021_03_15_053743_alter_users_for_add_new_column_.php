<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersForAddNewColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('avatar')->nullable()->after('password');
            $table->string('phone')->nullable();
            $table->enum('role', ['admin', 'student', 'tutor'])->default('student');
            $table->enum('auth_provider', ['site', 'google', 'facebook', 'twitter'])->default('site');
            $table->enum('status', ['active', 'inactive', 'pending'])->default('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
