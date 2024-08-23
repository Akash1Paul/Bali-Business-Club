<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userdetails', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->text('profile_pic')->nullable();
            $table->string('pseudo')->nullable();
            $table->string("d_où_viens_tu")->nullable();
            $table->string('es_tu_installé_à_Bali')->nullable();
            $table->string('depuis_combien_de_temps')->nullable();
            $table->string('pour_combien_de_temps_seras_tu_à_Bali')->nullable();
            $table->string('wpnumber')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tictok')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('tes_meilleures_skills')->nullable();
            $table->string('ton_parcours')->nullable();
            $table->string('tes_hobbies_à_bali')->nullable();
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
        Schema::dropIfExists('userdetails');
    }
};
