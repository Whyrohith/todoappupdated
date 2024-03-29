<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('todo_group_id')->nullable();
            $table->string("TaskName");
            $table->boolean("Completed")->nullable()->default(false);
            $table->text("TaskDescription")->nullable();
            $table->timestamp("completed_at")->nullable();
            $table->timestamps();

            $table->index('user_id');
            $table->index('todo_group_id');


            $table->unsignedBigInteger('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('todo_group_id')->references('id')->on('todo_groups')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
