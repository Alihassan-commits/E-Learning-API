<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {

            $table->id();
            // 👉 Primary key

            $table->text('body');
            // 👉 Comment text

            // 👉 POLYMORPHIC RELATION
            // creates:
            // commentable_id (BIGINT)
            // commentable_type (STRING)
            $table->morphs('commentable');

            $table->timestamps();
            // 👉 created_at, updated_at
        });
    }

    /**
     * Reverse the migrations
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
        // 👉 delete table on rollback
    }
};
