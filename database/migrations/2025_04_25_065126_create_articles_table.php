<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('title'); // Article Title
            $table->text('abstract'); // Brief Summary
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Foreign key referencing categories table
            $table->json('tags')->nullable(); // Tags (stored as a JSON array)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key referencing users table
            $table->longText('content'); // Article Content
            $table->json('supporting_files')->nullable(); // Supporting files (stored as JSON if multiple files)
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
