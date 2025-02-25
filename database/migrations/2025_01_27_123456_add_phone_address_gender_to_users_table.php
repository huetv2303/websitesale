<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
/**
* Run the migrations.
*/
 public function up(): void
         {
        Schema::table('users', function (Blueprint $table) {
        $table->string('phone')->unique(); // Thêm cột phone
        $table->text('address')->nullable(); // Thêm cột address
        $table->string('gender')->default('male'); // Thêm cột gender
        });
}

/**
* Reverse the migrations.
*/
public function down(): void
{
Schema::table('users', function (Blueprint $table) {
$table->dropColumn(['phone', 'address', 'gender']);
});
}
};
