<?php namespace Mail\MailDemo\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateUserSucribersTable extends Migration
{
    public function up()
    {
        Schema::create('mail_maildemo_user_sucribers', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->default('');
            $table->string('email')->default('');
            $table->string('ip')->default('');
            $table->integer('enable')->default(1);
            $table->string('receive')->default('html');
            $table->integer('confirmed')->integer(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mail_maildemo_user_sucribers');
    }
}
