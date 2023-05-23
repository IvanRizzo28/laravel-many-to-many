<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title',50)->unique();
            $table->text('description');
            $table->text('language');
            $table->string('image')->nullable();
            $table->string('slug',50)->unique();
            $table->unsignedBigInteger('type_id')->nullable();

            $table->foreign('type_id')
                ->references('id')
                ->on('types')
                ->nullOnDelete();
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
        Schema::dropIfExists('projects');
    }
};
