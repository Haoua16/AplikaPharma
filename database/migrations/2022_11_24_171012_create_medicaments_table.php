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
        Schema::create('medicaments', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('description');
            $table->string('quantite');
            $table->string('prix_unitaire');
            $table->string('adult_enfant');
            $table->string('geo_locaisation');


            $table->unsignedBigInteger("id_fournisseurs")->nullable();
                $table->foreign('id_fournisseurs')
                    ->references('id')
                    ->on('fournisseurs')
                    ->onDelete('cascade');

                //pour la personne qui enregistre le produit
                    $table->unsignedBigInteger("id_users");
                    $table->foreign('id_users')
                        ->references('id')
                        ->on('users')
                        ->onDelete('cascade');

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
        Schema::dropIfExists('medicaments');
    }
};
