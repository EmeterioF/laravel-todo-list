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
        //syntax       tablename                  variable for table
        Schema::create('tasks', function (Blueprint $table) {
            //syntax     tablename->dataType('column_name', optional_value)
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->boolean('is_completed')->default(false);
            $table->enum('priority', ['low', 'medium', 'high'])->default('high');
            $table->date('due_date');//YYYY-MM-DD
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
