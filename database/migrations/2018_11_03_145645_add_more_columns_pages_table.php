<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreColumnsPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->text('description')->after('user_id')->nullable();
            $table->string('location')->after('description')->nullable();
            $table->string('slug')->after('location')->unique();
            $table->date('published_at')->after('slug')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('location');
            $table->dropColumn('slug');
            $table->dropColumn('published_at');
        });
    }
}
