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
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date');
            $table->time('time');
            $table->string('customerName');
            $table->float('customerBalance');
            $table->string('customerID')->unique();
            $table->string('projectName');
            $table->date('projectStart');
            $table->date('projectEnd');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
