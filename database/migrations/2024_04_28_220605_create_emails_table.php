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
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->string("company")->nullable();
            $table->string("group")->nullable();
            $table->string("city")->nullable();
            $table->string("activity")->nullable();
            $table->string("person")->nullable();
            $table->string("function")->nullable();
            $table->string("tel")->nullable();
            $table->string("tax")->nullable();
            $table->string("fax")->nullable();
            $table->string("gsm")->nullable();
            $table->string("email")->nullable();
            $table->string("address")->nullable();
            $table->foreignId("category_id")->constrained();
            $table->foreignId("user_id")->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emails');
    }
};
