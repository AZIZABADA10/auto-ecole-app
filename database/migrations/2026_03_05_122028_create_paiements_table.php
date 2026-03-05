<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidat_id')->constrained()->cascadeOnDelete();
            $table->decimal('montant', 8, 2);
            $table->string('methode_paiement')->nullable(); // carte, especes, virement
            $table->date('date_paiement')->nullable();
            $table->string('statut')->default('en_attente'); // paye, en_attente
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('paiements');
    }
};
