<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_contents', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->unsignedBigInteger('comment_id');
            $table->timestamps();

            $table->foreign('comment_id')
                ->references('id')
                ->on('comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_contents');
    }
}
