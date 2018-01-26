<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pkey')->unique();
            $table->string('name');
            $table->double('account');
            $table->string('list');
            $table->boolean('archived')->default(0);
            $table->integer('status')->nullable();
            $table->string('user_id')->nullable();
            $table->string('inquiry_id')->nullable();
            $table->text('notes')->nullable();
            $table->timestamp('created')->useCurrent();
            $table->timestamp('due')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
