<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('prenom')->nullable();
            $table->string('nom')->nullable();
            $table->string('fullname')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('tel')->nullable();
            $table->string('cni')->nullable();
            $table->string('titre')->nullable();
            $table->string('sexe')->nullable();
            $table->text('note')->nullable();
            $table->date('datenaissance')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
