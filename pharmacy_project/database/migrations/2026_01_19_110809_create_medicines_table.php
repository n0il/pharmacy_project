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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
        $table->string('name');
        $table->string('generic_name');
        $table->string('sku')->unique();
        $table->decimal('price', 8, 2);
        $table->integer('reorder_level')->default(10); // Това ще прати alert когато запасите станат по малко от стойността която сме му задали
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
