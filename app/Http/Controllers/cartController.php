<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\order;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class cartController extends Controller
{
    //
    public function show()
{
    $email = Auth::user()->email;

    $orders = Order::where('email', $email)
                    ->where('status', 'cart')
                    ->latest()
                    ->filter(request(['tag', 'search', 'location']))
                    ->get();

    $mergedOrders = $orders->groupBy('product_id')->map(function($group) {
        $firstOrder = $group->first();
        $firstOrder->total_quantity = $group->sum('quantity');
        $firstOrder->total_price = $group->sum(function($order) {
            return $order->quantity * $order->unit_price;
        });
        return $firstOrder;
    });


    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    $perPage = 6;
    $currentItems = $mergedOrders->slice(($currentPage - 1) * $perPage, $perPage)->values();
    $paginatedMergedOrders = new LengthAwarePaginator($currentItems, $mergedOrders->count(), $perPage, $currentPage, [
        'path' => LengthAwarePaginator::resolveCurrentPath()
    ]);

    return view('listings.showCart', [
        'orders' => $paginatedMergedOrders
    ]);
}


    public function add(Request $request){
      
        $formFields = $request->validate([
            'product_id'=> 'required',
            'quantity' => 'required',
            'name' => 'required',
            'unit_price'=> 'required',
            'location' => 'required',
            'logo' => 'required'
        ]); 

        $formFields['user'] = Auth::user() -> name;
        $formFields['total_price'] = $formFields['unit_price'] * $formFields['quantity'];
        $formFields['email'] = Auth::user() -> email;

        //dd($formFields);

        order::create($formFields);

        return redirect()->route('farmerDashboard')->with('message', 'Order filled, added to cart!');

    }

    public function markAsPaid(Order $order)
    {
        $order->update(['paid' => true, 'status' => 'pending']);
    
        return redirect('farmerDashboard/showCart')->with('success', 'Order marked as paid and moved to pending delivery.');
    }

    public function destroy(Order $order)
{
    $order->delete();

    return redirect('farmerDashboard/showCart')->with('success', 'Order deleted successfully.');
}

}
