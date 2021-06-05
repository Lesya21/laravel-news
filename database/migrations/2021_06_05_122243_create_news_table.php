<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->string('code')->nullable();
            $table->string('author', 50)->nullable();
            $table->text('description')->nullable();
            $table->longText('detail_text')->nullable();
            //$table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->enum('status', ['draft', 'published', 'blocked'])->default('draft');
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
        Schema::dropIfExists('news');
    }
}
