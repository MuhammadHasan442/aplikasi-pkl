<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateDataServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_servers', function (Blueprint $table) {
            $table->id();
			$table->string('merk_server');
			$table->string('jenis');
			$table->string('harddisk');
			$table->string('ram');
			$table->string('processor');
			$table->string('os');
			$table->string('tahun');
			$table->string('penggunaan');
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
        Schema::dropIfExists('data_servers');
    }
}
