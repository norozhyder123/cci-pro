<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_comments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parent_comment_id')->unsigned();
            $table->bigInteger('comment_id')->unsigned();
            $table->string('status')->default('active');
            $table->timestamps();

            $table->foreign('parent_comment_id')->references('id')->on('blog_comments')->onDelete('cascade');
            $table->foreign('comment_id')->references('id')->on('blog_comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_comments');
    }
}
