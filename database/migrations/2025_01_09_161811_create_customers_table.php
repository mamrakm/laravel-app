<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('name'); // Customer name
            $table->string('email')->unique(); // Customer email
            $table->string('phone')->nullable(); // Customer phone number
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
