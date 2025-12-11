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
        Schema::dropIfExists('submissions');

        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->string('program_name');
            $table->string('organization_name');
            $table->string('category');
            $table->string('country');
            $table->string('website_url')->nullable();
            $table->text('description');
            $table->string('contact_email');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
