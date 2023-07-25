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
        Schema::create('conversion_histories', function (Blueprint $table) {
            $table->id();
            $table->string('old_currency');
            $table->string('new_currency');
            $table->float('old_amount');
            $table->float('new_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversion_histories');
    }
};
