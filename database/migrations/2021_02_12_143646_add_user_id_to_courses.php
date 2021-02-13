<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->default('0');
			//$table->dropPrimary();
			//$table->primary(['id', 'user_id']);
        });
		
		//Schema::table('courses', function (Blueprint $table) {
           
			//$table->dropPrimary('id_primary');
			//$table->primary(['id', 'user_id']);
        //});
		
		DB::unprepared('ALTER TABLE "courses" DROP PRIMARY KEY, ADD PRIMARY KEY ("id", `user_id`)');
		
		
		//DB::unprepared('ALTER TABLE `courses` DROP PRIMARY KEY, ADD PRIMARY KEY (  `id` ,  `user_id` )');
		
		Schema::table('courses', function (Blueprint $table) {
		$table->foreign('user_id')->references('id')->on('users');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
			$table->dropForeign('courses_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}
