<?php
namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Users;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    
    public function index(Request $request)
    {
        // Fetch orders and apply the filter
        $orders = Orders::with(['users', 'coins']) // Load both user and coins relationships
        ->orderBy('datetime', 'desc') // Order by latest data
        ->get();
        
        return view('orders.index', compact('orders'));
    }
    
    public function destroy($id)
    {
        Orders::findOrFail($id)->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
