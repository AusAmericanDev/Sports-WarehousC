namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Category;

class CheckoutController extends Controller
{
public function index()
{
$categories = Category::all();
$cart = session()->get('cart', []);

if(empty($cart)) {
return redirect()->back()->with('error', 'Your shopping cart is empty!');
}

return view('checkout.index', compact('categories', 'cart'));
}

public function placeOrder(Request $request)
{
// Server-side validation fallback
$request->validate([
'first_name' => 'required|string|max:50',
'last_name' => 'required|string|max:50',
'delivery_address' => 'required|string',
'contact_number' => 'required|numeric',
'email_address' => 'required|email',
'card_number' => 'required|numeric',
'expiry_date' => 'required|string',
'card_name' => 'required|string',
]);

$cart = session()->get('cart', []);
$total = 0;
foreach($cart as $item) {
$total += ($item['sale_price'] ?? $item['price']) * $item['quantity'];
}

// Save order metadata details
$order = Order::create([
'first_name' => $request->first_name,
'last_name' => $request->last_name,
'delivery_address' => $request->delivery_address,
'contact_number' => $request->contact_number,
'email_address' => $request->email_address,
'card_number' => $request->card_number,
'expiry_date' => $request->expiry_date,
'card_name' => $request->card_name,
'total_price' => $total,
]);

// Save each item individual line record map
foreach ($cart as $id => $details) {
OrderItem::create([
'order_id' => $order->id,
'product_id' => $id,
'quantity' => $details['quantity'],
'price' => $details['sale_price'] ?? $details['price'],
]);
}

// Flush out current session basket entries
session()->forget('cart');

return redirect()->route('checkout.confirmation', $order->id);
}

public function confirmation($id)
{
$categories = Category::all();
$order = Order::findOrFail($id); // Order ID acts as your assigned order number reference
return view('checkout.confirmation', compact('categories', 'order'));
}
}