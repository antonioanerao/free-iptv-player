
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIptvListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Using text for all columns if db connection is mysql to prevent
         *
         */
        if(env('DB_CONNECTION') == 'mysql') {
            Schema::create('iptv_lists', function (Blueprint $table) {
                $table->id();
                $table->text('tvtitle')->nullable();
                $table->string('tvmedia')->nullable();
                $table->string('tvid')->nullable();
                $table->text('tvname')->nullable();
                $table->text('tvlogo')->nullable();
                $table->text('tvgroup')->nullable();
                $table->string('maingroup')->nullable(); //live, movies or series get from the url
                $table->timestamps();
            });
        } else {
            Schema::create('iptv_lists', function (Blueprint $table) {
                $table->id();
                $table->string('tvtitle')->nullable();
                $table->string('tvmedia')->nullable();
                $table->string('tvid')->nullable();
                $table->string('tvname')->nullable();
                $table->text('tvlogo')->nullable();
                $table->string('tvgroup')->nullable();
                $table->string('maingroup')->nullable(); //live, movies or series get from the url
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iptv_lists');
    }
}
