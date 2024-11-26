<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id('ItemID');
            $table->unsignedBigInteger('CategoryID');
            $table->unsignedBigInteger('LocationID');
            $table->unsignedBigInteger('userID');
            $table->integer('Quantity'); 
            $table->enum('Status', ['Functional', 'Not Functional']);
            $table->date('DateAdded');
            $table->text('Notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            
            $table->foreign('CategoryID')->references('CategoryID')->on('categories')->onDelete('cascade');
            $table->foreign('LocationID')->references('LocationID')->on('locations')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
};
