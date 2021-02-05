<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->date('due_date');
            $table->enum('status',['open','close']);
            $table->tinyInteger('sendmail')->default(0);
            $table->tinyInteger('star')->default(0);
            $table->enum('priority',['low','high','emergency']);
            // To Be Dynamic
            $table->enum('type',['created','ongoing','testing','finished']);
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('assign_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('assign_id')->references('id')->on('admins')->onDelete('cascade');
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
        Schema::dropIfExists('tasks');
    }
}
