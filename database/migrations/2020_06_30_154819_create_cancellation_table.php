 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCancellationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancellation_reasons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('detail')->unique();
            $table->boolean('office_use')->nullable();
        });

        Schema::create('cancellations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('shop_id')->unsigned()->nullable();
            $table->integer('cancellation_reason_id')->unsigned()->nullable();
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();
            $table->text('items')->nullable();
            $table->longtext('description')->nullable();
            $table->boolean('return_goods')->nullable();
            $table->integer('status')->unsigned()->default(1);
            $table->timestamps();
            $table->text('description_new')->nullable();
            $table->text('exchnage_return_option')->nullable();
            $table->text('exchange_more_option')->nullable();
            $table->text('return_more_option')->nullable();
            $table->text('return_more_sub_option')->nullable();
            // $table->text('product_id')->nullable();
            $table->text('approve_items')->nullable();
            $table->text('decline_item')->nullable();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('cancellation_reason_id')->references('id')->on('cancellation_reasons')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cancellations');
        Schema::dropIfExists('cancellation_reasons');
    }
}
