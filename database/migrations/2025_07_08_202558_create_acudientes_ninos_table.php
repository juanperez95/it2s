<?php

use App\Models\Acudiente;
use App\Models\Nino;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('acudientes_ninos', function (Blueprint $table) {
            $table->id();
            // Relacion de Niños
            $table->foreignIdFor(Nino::class)->constrained()->onDelete('cascade');
            // Relacion de acudientes
            $table->foreignIdFor(Acudiente::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acudientes_ninos');
    }
};
