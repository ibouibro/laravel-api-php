<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comandes', function (Blueprint $table) {
            $table->id();
            $table->string("nom_prenom");
            $table->string("telephone");
            $table->string("email");
            $table->string("addresse");
            $table->datetime("date");
            $table->integer("etat");
            $table->bigInteger("id_pub")->unsigned();
            $table->foreign("id_pub")->references("id")->on("publications")->onDelete('cascade');
            $table->timestamps();
        });
    
    
    Schema::table('comandes', function (Blueprint $table) {

        $table->foreign("id_pub")->references("id")->on("publications")->onDelete('cascade');
            
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comandes');
    }
}
