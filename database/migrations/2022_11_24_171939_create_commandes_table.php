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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id(); 
            $table->string('ordonnance'); 
            $table->string('statut');           
            $table->unsignedBigInteger("id_medicaments")->nullable();
                $table->foreign('id_medicaments')
                    ->references('id')
                    ->on('medicaments')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('commandes');
    }
};
