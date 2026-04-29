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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('service_id')->constrained()->cascadeOnDelete();

            $table->string('title');
            $table->string('slug')->unique();

            $table->text('excerpt')->nullable(); 

            $table->string('thumbnail')->nullable();

            $table->string('author_name')->nullable();
            $table->string('author_image')->nullable();

            $table->timestamp('published_at')->nullable();

            $table->integer('read_time')->nullable();

            $table->longText('content_json')->nullable();

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            $table->boolean('is_published')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
