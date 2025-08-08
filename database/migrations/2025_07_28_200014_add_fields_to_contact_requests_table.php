<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
    {
        Schema::table('contact_requests', function (Blueprint $table) {
            $table->string('company')->nullable(); // حقل اسم الشركة
            $table->string('budget')->nullable();  // حقل الميزانية
            $table->string('timeline')->nullable(); // حقل الإطار الزمني
        });
    }

    public function down()
    {
        Schema::table('contact_requests', function (Blueprint $table) {
            $table->dropColumn(['company', 'budget', 'timeline']); // حذف الحقول عند التراجع
        });
    }
};
