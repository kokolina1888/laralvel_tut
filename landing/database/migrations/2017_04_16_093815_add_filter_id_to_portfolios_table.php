<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFilterIdToPortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('portfolios', function($table) {
         $table->integer('filter_id')->unsigned();

         $table->foreign('filter_id')->references('id')->on('filters');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('portfolios', function($table) {
        $table->dropColumn('filter_id');
    });
   }
}
