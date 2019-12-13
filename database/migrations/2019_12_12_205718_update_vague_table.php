<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateVagueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vagues', function (Blueprint $table) {
            //
            $table->integer('quantite_restante')->nullable();
            $table->unsignedBigInteger('approvisionnement_id');
            
            $table->foreign('approvisionnement_id')
                ->references('id')->on('approvisionnements')
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
        Schema::table('vagues', function (Blueprint $table) {
            //
            $table->dropForeign('vagues_approvisionnement_id_foreign');

            $table->dropColumn('quantite_restante');
            $table->dropColumn('approvisionnement_id');
        });
    }
}
