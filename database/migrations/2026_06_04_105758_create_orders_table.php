public function up(): void
{
Schema::create('orders', function (Blueprint $table) {
$table->id(); // This acts as the Order Number
$table->string('first_name');
$table->string('last_name');
$table->string('delivery_address');
$table->string('contact_number');
$table->string('email_address');
// Assessment requirements (storing payment data directly)
$table->string('card_number');
$table->string('expiry_date');
$table->string('card_name');
$table->decimal('total_price', 10, 2);
$table->timestamps();
});
}