<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issued_histories', function (Blueprint $table) {
            $table->id();
            $table->string('NameIssued');
            $table->string('BookIssued');
            $table->string('dateExpectedReturn');
            $table->string('dateIssued');
            $table->string('dateReturned');
            $table->timestamps();
        });
    }
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issued_histories');
    }
};
