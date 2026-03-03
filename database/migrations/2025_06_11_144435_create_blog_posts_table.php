<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('author');
            // $table->date('published_date')->default(now());
            $table->integer('reading_time')->default(3); // in minutes
            $table->text('excerpt');
            $table->longText('content');
            $table->string('featured_image')->nullable();
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->timestamp('published_at')->nullable();
            // $table->string('category')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->json('meta_data')->nullable(); // For SEO meta tags
            $table->integer('views')->default(0);
            $table->boolean('is_featured')->default(false);

            $table->index(['status', 'published_at']);
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
        Schema::dropIfExists('blog_posts');
    }
}
