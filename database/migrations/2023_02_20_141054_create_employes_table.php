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
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->string("EMPNO")->nullable(true)->comment("Employee number");
            $table->string("FIRSTNME")->nullable(true)->comment("First name of employee");
            $table->string("MIDINIT")->nullable(true)->comment("Middle initial of employee");
            $table->string("LASTNAME")->nullable(true)->comment("Family name of employee");
            $table->string("WORKDEPT")->nullable(true)->comment(" ID of department in which the employee works");
            $table->unsignedBigInteger("PHONENO")->nullable(true)->comment("Employee telephone number");
            $table->date("HIREDATE")->nullable(true)->comment("Date of hire");
            $table->string("JOB")->nullable(true)->comment("Job held by the employee");
            $table->string("EDLEVEL")->nullable(true)->comment("Number of years of formal education");
            $table->enum("SEX",['m','f'])->nullable(true)->comment("Sex of the employee (M or F)");
            $table->date("BIRTHDATE")->nullable(true)->comment("Date of birth");
            $table->string("SALARY")->nullable(true)->comment(" Yearly salary in rupees");
            $table->string("BONUS")->nullable(true)->comment("Yearly bonus in rupees");
            $table->string("COMM")->nullable(true)->comment("Yearly commission in rupees");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employes');
    }
};
