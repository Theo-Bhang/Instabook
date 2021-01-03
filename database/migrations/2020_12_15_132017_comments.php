<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text("text");// Texte du commentaire
            $table->foreignId("photo_id");// Clé etrangere photo id
            $table->foreignId("comment_id")->nullable()->constrained()->onDelete("set null");// Clé etrangere comment id qui peut etre null
            $table->foreignId("user_id")->nullable()->constrained()->onDelete("set null"); // Clé etrangere user id qui peut etre null
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
        Schema::dropIfExists('comments');
    }
}
