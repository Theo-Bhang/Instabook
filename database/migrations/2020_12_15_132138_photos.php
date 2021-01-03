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
            $table->id(); // Photo id
            $table->string("title");// Titre de la photo
            $table->text("description");// Description de la photo
            $table->date("date")->nullable();// Date de la photo facultatif
            $table->string("file");// Le chemin du fichier de la photo
            $table->integer("resolution")->nullable();// Int de la resolution facultatif            
            $table->integer("width");// Largeur de la photo
            $table->integer("height");// Hauteur de la photo
            $table->foreignId("user_id")->nullable()->constrained()->onDelete("set null");// Clé etrangere user id facultative et qui lors de sa suppression deviens null
            $table->foreignId("group_id")->constrained()->onDelete("cascade"); // Clé etrangere group id
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
