<?php

use App\Models\Acudiente;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    // Campos de la tabla de niños
    public function up(): void
    {
        Schema::create('ninos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('salon');
            $table->integer('edad');
            $table->enum('genero', ['Femenino', 'Masculino']); // Solo definir Femenino y Masculino
            $table->foreignIdFor(Acudiente::class)->constrained()->onDelete('cascade'); // Relación con la tabla Acudiente
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ninos');
    }
};
