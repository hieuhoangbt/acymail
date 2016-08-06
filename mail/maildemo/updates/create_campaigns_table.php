<?php namespace Mail\MailDemo\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCampaignsTable extends Migration
{
    public function up()
    {
        Schema::create('mail_maildemo_campaigns', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mail_maildemo_campaigns');
    }
}
