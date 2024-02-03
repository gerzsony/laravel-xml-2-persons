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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();

            $table->integer('person_id')->nullable();       //AZONOSITO
            $table->foreign('person_id')->references('person_id')->on('persons');

            $table->integer('tax_number')->nullable();      // ADOAZONOSITOJEL
            $table->string('full_name', 100)->nullable();   // TELJESNEV
            $table->integer('other_id')->nullable();        // EGYEBID
            $table->date('entry_date')->nullable();         // BELEPES
            $table->date('leave_date')->nullable();  // KILEPES
            $table->string('email_address', 100)->nullable();    // EMAILCIM

            $table->dateTime('record_created', $precision = 0)->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->enum('insert_status', ['successful', 'failed'] )->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
