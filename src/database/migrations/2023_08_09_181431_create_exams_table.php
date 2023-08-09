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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_year_id')->constrained('exam_years')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('question_number');
            $table->integer('question_sub_number')->nullable();
            $table->string('question_text')->nullable();
            $table->string('question_img')->nullable();
            $table->string('answer');
            $table->string('explanation_text')->nullable();
            $table->string('explanation_img')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
};
