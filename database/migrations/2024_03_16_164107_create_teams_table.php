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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();

            // organization
            $table->foreignId('organization_id')->constrained()->onDelete('cascade');

            // Foreign key to the project
            $table->foreignId('project_id')->constrained()->onDelete('cascade');

            // Foreign key to the user
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // The role of the user in the team
            $table->foreignId('role_id');

            // skill
            $table->foreignId('skill_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
