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
        Schema::create('article', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained('author');
            $table->string('title');
            $table->string('description');
            $table->mediumText('content');
            $table->foreignId('category_id')->constrained('category');
            $table->enum('featured', [0, 1])->default(0);
            $table->enum('approval_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->enum('publication_status', ['active', 'suspended']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article');
    }
};
