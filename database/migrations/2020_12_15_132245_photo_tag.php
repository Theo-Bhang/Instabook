<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PhotoTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_tag', function (Blueprint $table) {
            $table->id();// id photo  tag
            $table->foreignId("photo_id")->constrained()->cascadeOnDelete();//clé etrangere photo id
            $table->foreignId("tag_id")->constrained()->cascadeOnDelete();//clé etrangere tag id
            $table->unique(["photo_id", "tag_id"]);// on rend unique les clés etrangeres 
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
        Schema::dropIfExists('photo_tag');
    }
}
