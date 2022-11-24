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
        Schema::create('operation_recentes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("id_ventes");
            $table->foreign('id_ventes')
                ->references('id')
                ->on('ventes')
                ->onDelete('cascade');
            
                $table->unsignedBigInteger("id_fournisseurs")->nullable();
                $table->foreign('id_fournisseurs')
                    ->references('id')
                    ->on('fournisseurs')
                    ->onDelete('cascade');

                    $table->unsignedBigInteger("id_depenses");
                    $table->foreign('id_depenses')
                        ->references('id')
                        ->on('depenses')
                        ->onDelete('cascade');
                        
                        $table->unsignedBigInteger("id_commandes");
                        $table->foreign('id_commandes')
                            ->references('id')
                            ->on('commandes')
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
        Schema::dropIfExists('operation_recentes');
    }
};
