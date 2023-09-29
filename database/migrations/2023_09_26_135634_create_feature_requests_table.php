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
        Schema::create('feature_requests', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('app_id'); 
            $table->foreign('app_id')->references('id')->on('user_apps');
            $table->uuid('feature_request_id');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('feature_request_title');
            $table->longText('feature_request_description');

            $table->enum('status', ['pending', 'approved', 'in-progress', 'completed', 'rejected'])->default('pending');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_requests');
    }
};
