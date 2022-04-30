<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\City;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 200);
            $table->string('lastname', 200);
            $table->string('username', 30)->unique();
            $table->unsignedBigInteger('phone_code_id')->nullable()->constrained();
            $table->foreign('phone_code_id')->references('id')->on('countries');
            $table->bigInteger('phone')->nullable();
            $table->string('email', 200)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->foreignIdFor(City::class)->nullable()->constrained();
            $table->string('address', 250)->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
