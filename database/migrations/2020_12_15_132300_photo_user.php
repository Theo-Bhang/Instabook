<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PhotoUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_user', function (Blueprint $table) {
            $table->id(); // id photo user
            $table->foreignId("photo_id")->constrained()->onDelete("cascade");//clé etrangere photo id
            $table->foreignId("user_id")->constrained()->onDelete("cascade");//clé etrangere user id
            $table->unique(["photo_id", "user_id"]);// on rend unique les clés etrangeres
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
        Schema::dropIfExists('photo_user');
    }
}
