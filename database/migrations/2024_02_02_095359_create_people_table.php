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
        Schema::create('persons', function (Blueprint $table) {
            $table->increments('person_id');    //AZONOSITO
            $table->integer('tax_number');      // ADOAZONOSITOJEL
            $table->string('full_name', 100);   // TELJESNEV
            $table->integer('other_id');        // EGYEBID
            $table->date('entry_date');         // BELEPES
            $table->date('leave_date')->nullable();  // KILEPES
            $table->string('email_address', 100);    // EMAILCIM

            $table->dateTime('record_created', $precision = 0)->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->unique('tax_number'); 
            $table->unique('other_id'); //it is not written in the original description if this kind of id is unique or not. I suppose yes.
            $table->unique('email_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
};
