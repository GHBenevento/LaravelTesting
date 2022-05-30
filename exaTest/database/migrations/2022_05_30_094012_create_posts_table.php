<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

            $table->string('title');
            $table->string('extract');
            $table->string('content');
            $table->boolean('expires')->nullable();
            $table->boolean('comment')->nullable();
            $table->enum('access', ['private', 'public']);
            
            $table->date('date')->nullable();


        });

        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')
            ->nullable()
            ->after('id');
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('set null');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

