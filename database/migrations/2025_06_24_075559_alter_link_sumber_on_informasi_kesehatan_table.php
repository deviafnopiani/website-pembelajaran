<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('informasi_kesehatan', function (Blueprint $table) {
        $table->text('link_sumber')->change(); // dari varchar jadi text
    });
}

public function down()
{
    Schema::table('informasi_kesehatan', function (Blueprint $table) {
        $table->string('link_sumber', 255)->change(); // fallback
    });
}

};
