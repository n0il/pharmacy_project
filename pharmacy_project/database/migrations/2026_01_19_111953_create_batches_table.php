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
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
        
        $table->foreignId('medicine_id')->constrained()->onDelete('cascade');
        
        $table->string('batch_number'); 
        $table->integer('quantity'); 
        $table->decimal('buy_price', 10, 2); 
        $table->decimal('sell_price', 10, 2); 
        
        $table->date('expiry_date'); 
        $table->boolean('is_active')->default(true);
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batches');
    }
};
