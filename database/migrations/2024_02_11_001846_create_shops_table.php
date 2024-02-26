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
        Schema::disableForeignKeyConstraints();

        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('users');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('excerpt')->nullable();
            $table->string('status', 10);
            $table->string('type', 10);
            $table->string('comment_status');
            $table->string('ping_status', 10);
            $table->integer('position')->default(0);
            $table->boolean('is_active')->default(true);

            // webiste
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            // $table->string('fax')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country')->default('Maroc');

            // tiktok
            $table->string('tiktok')->nullable();
            // facebook
            $table->string('facebook')->nullable();
            // instagram
            $table->string('instagram')->nullable();
            // youtube
            $table->string('youtube')->nullable();

            $table->foreignId('createdby_id')->nullable()->constrained('users');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
