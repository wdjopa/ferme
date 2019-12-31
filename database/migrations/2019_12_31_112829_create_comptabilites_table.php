<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComptabilitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptabilites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('auto')->default(false);
            $table->boolean('depense')->default(false);
            $table->boolean('recette')->default(false);
            $table->integer('montant');
            $table->datetime('date');
            $table->string('categorie')->nullable();
            $table->bigInteger('categorie_id')->nullable();
            $table->text('commentaire')->nullable();
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
        Schema::dropIfExists('comptabilites');
    }
}
