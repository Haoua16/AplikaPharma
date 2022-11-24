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
        Schema::create('ventes', function (Blueprint $table) {
            $table->id();
            $table->string('quantite');

            $table->unsignedBigInteger("id_medicaments");
            $table->foreign('id_medicaments')
                ->references('id')
                ->on('medicaments')
                ->onDelete('cascade');

            $table->unsignedBigInteger("id_users");
            $table->foreign('id_users')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

                //si la vente est faite avec assurance, 
                //ici nous voulons recuperer les details de cette assureance, ce champs est optionnel
                $table->unsignedBigInteger("id_clients")->nullable();
                $table->foreign('id_clients')
                    ->references('id')
                    ->on('clients')
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
        Schema::dropIfExists('ventes');
    }
};
