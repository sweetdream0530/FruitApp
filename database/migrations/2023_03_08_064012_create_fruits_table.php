<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('fruits', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('family');
            $table->string('genus')->nullable();
            $table->string('order')->nullable();
            $table->float('carbohydrates')->nullable();
            $table->float('protein')->nullable();
            $table->float('fat')->nullable();
            $table->float('calories')->nullable();
            $table->float('sugar')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fruits');
    }
};
