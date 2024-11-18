<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use function redirect;
use function view;

class OrderController extends Controller
{

    public function index()
    {
        return view('admin.orders.index', [
            'orders' => Order::query()->with('user')->paginate(10),
        ]);
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', [
            'order' => $order->load('products', 'user')
        ]);
    }

    public function update(Request $request, Order $order)
    {
        $request->validate(['status' => ['required', 'in:shipped,pending,completed,canceled']]);

        $order->update([
            'status' => $request['status'],
        ]);

        return redirect('/admin/orders')
            ->with('success', 'Order status updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect('/admin/orders');
    }
}
