<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('task_show')->default(0);
            $table->tinyInteger('task_add')->default(0);
            $table->tinyInteger('task_edit')->default(0);
            $table->tinyInteger('task_delete')->default(0);
            $table->tinyInteger('task_open')->default(0);
            $table->tinyInteger('task_close')->default(0);
            $table->tinyInteger('task_reopen')->default(0);
            $table->tinyInteger('task_assign')->default(0);
            $table->tinyInteger('super')->default(0);
            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
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
        Schema::dropIfExists('permissions');
    }
}
