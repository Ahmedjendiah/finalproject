<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->integer("id",11);
            $table->varchar("name",40);
            $table->timestamps();
            $table->Decimal(4,2);
            $table->varchar("Gender",1);
            $table->varchar("Salary",6);
            $table->integer("empId",11);
            $table->integer("ManegId",11);
            $table->tinyInteger("EmpStatus",4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
