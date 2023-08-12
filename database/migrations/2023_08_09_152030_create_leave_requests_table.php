<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('leave_type_id')->nullable()->constrained()->nullOnDelete();
            $table->string('employee_name');
            $table->enum('status' , ['accepted' , 'rejected' , 'pending'])->default('pending');
            $table->string('reason');
            $table->date('start_date')->nullable();
            $table->integer('duration')->nullable();
            $table->string('reject_reason')->nullable();
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
    }
};
