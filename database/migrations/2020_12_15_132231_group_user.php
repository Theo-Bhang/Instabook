<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GroupUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_user', function (Blueprint $table) {
            $table->id(); //id group user 
            $table->foreignId("group_id")->constrained()->cascadeOnDelete();//clé etrangere group id
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();//clé etrangere user id
            $table->unique(["group_id", "user_id"]);// on rend unique les clés etrangeres 
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
        Schema::dropIfExists('group_user');
    }
}
