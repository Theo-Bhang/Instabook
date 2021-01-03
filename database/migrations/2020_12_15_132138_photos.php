<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Photos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id(); //photo id
            $table->string("title");//titre de la photo
            $table->text("description");//description de la photo
            $table->date("date")->nullable();//date de la photo facultatif
            $table->string("file");//le chemin du fichier de la photo
            $table->integer("resolution")->nullable();//int de la resolution facultatif            
            $table->integer("width");//largeur de la photo
            $table->integer("height");//hauteur de la photo
            $table->foreignId("user_id")->nullable()->constrained()->onDelete("set null");//clé etrangere user id facultative et qui lors de sa suppression deviens null
            $table->foreignId("group_id")->constrained()->onDelete("cascade"); //cle etrangere group id
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
        Schema::dropIfExists('photos');
    }
}
