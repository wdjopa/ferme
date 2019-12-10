<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovisionnementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approvisionnements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fournisseur_id')->nullable();
            $table->unsignedBigInteger('categorie_approvisionnement_id');

            $table->datetime('date_approvisionnement');
            $table->integer('quantite');
            $table->text('description');
            $table->integer('prix_total');
            $table->timestamps();
            
            $table->foreign('fournisseur_id')
                ->references('id')->on('fournisseurs')
                ->onDelete('set null');
            $table->foreign('categorie_approvisionnement_id')
                ->references('id')->on('categorie_approvisionnements')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('approvisionnements');
    }
}
