<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vague_id')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('livraison_id')->nullable();
            $table->unsignedBigInteger('paiement_id')->nullable();
            $table->integer('quantite');
            $table->integer('cout_total');
            $table->datetime('date');
            
            $table->foreign('vague_id')
                ->references('id')->on('vagues')
                ->onDelete('set null');
            $table->foreign('client_id')
                ->references('id')->on('clients')
                ->onDelete('set null');
            $table->foreign('livraison_id')
                ->references('id')->on('livraisons')
                ->onDelete('set null');
            $table->foreign('paiement_id')
                ->references('id')->on('paiements')
                ->onDelete('set null');
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
        Schema::dropIfExists('commandes');
    }
}
