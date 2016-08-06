<?php namespace Mail\MailDemo\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateListSubTable extends Migration
{
    public function up()
    {
        Schema::create('mail_maildemo_list_sub', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('list_id')->default(0);
            $table->integer('subcriber_id')->default(0);
            $table->timestamp('subcriber_date')->nullable();
            $table->timestamp('unsubcriber_date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mail_maildemo_list_sub');
    }
}
