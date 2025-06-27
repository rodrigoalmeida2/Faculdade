<?php

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
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aluno_id')
                ->constrained('alunos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('disciplina_id')
                ->constrained('disciplinas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->year('ano');
            $table->tinyInteger('semestre'); // 1 ou 2
            $table->decimal('nota', 4, 2)->nullable();
            $table->decimal('frequencia', 5, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['aluno_id', 'disciplina_id', 'ano', 'semestre']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};
