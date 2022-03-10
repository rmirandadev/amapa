<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->string('slug');
            $table->date('publication_date');
            $table->string('image')->nullable();
            $table->string('image_legend')->nullable();
            $table->string('image_photographer')->nullable();
            $table->text('text')->nullable();
            $table->enum('status',array_keys(\App\Models\Post::STATUS));
            $table->integer('clicks')->default(0);
            $table->enum('highlight',array_keys(\App\Models\Post::HIGHTLIGHT));
            $table->enum('finished',array_keys(\App\Models\Post::FINISHED));

            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('subcategory_id')->constrained('subcategories');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('user_finished_id')->nullable()->constrained('users');
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
        Schema::dropIfExists('posts');
    }
}
