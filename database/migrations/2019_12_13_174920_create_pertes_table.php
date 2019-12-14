<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vague_id');
            $table->integer('quantite')->nullable();
            $table->integer('somme')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            
            $table->foreign('vague_id')
                ->references('id')->on('vagues')
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
        Schema::dropIfExists('pertes');
    }
}
