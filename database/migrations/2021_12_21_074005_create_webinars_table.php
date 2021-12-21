<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebinarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webinars', function (Blueprint $table) {
            $table->id();
            $table->integer('teacher_id')->unsigned();
            $table->integer('creator_user_id')->unsigned();
            $table->string('title',64);
            $table->integer('start_date');
            $table->integer('end_date');
            $table->string('image_cover');
            $table->string('video_demo')->nullable();
            $table->integer('capacity')->unsigned();
            $table->integer('price')->unsigned();
            $table->text('description')->nullable();
            $table->boolean('support')->default(false);
            $table->boolean('partner_instructor')->default(false);
            $table->boolean('subscribe')->default(false);
            $table->text('message_for_reviewer')->nullable();
            $table->enum('status',['active','pending','is_draft','inactive']);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('webinars');
    }
}
