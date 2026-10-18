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
        Schema::table('books', function(Blueprint $table){

            $table->string('author', 100)->nullable(false)->change();
            $table->integer('pages')->nullable(false)->change();
            $table->integer('year')->nullable(false)->change();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function(Blueprint $table){

            $table->string('author', 100)->nullable()->change();
            $table->integer('pages')->nullable()->change();
            $table->integer('year')->nullable()->change();

        });
    }
};
