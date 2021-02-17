<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('cover')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('user_id')->constrained();

            // 0-255
            $table->unsignedTinyInteger('discount')->nullable()->default(0);
            
            // 0-4294967295
            // https://www.red-gate.com/hub/product-learning/sql-prompt/the-dangers-of-using-float-or-real-datatypes
            $table->unsignedInteger('price');

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
        Schema::dropIfExists('books');
    }
}
