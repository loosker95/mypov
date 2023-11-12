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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('target_Key');
            $table->string('user_id');
            $table->string('avatar');
            $table->text('body');
            $table->enum('sort', ['ASC', 'DESC']);
            $table->enum('number_of_rows', ['10', '20', '40', '50', 'All']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
