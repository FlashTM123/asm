<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception;

class OrderController extends Controller
{
    public function getAllOrders()
    {
        try {
            $orders = DB::table('orders')
                ->join('customers', 'orders.customer_id', '=', 'customers.id')
                ->leftJoin('order_detail', 'orders.id', '=', 'order_detail.order_id')
                ->leftJoin('product', 'order_detail.product_id', '=', 'product.id') // Đảm bảo join đúng
                ->select(
                    'orders.id as order_id',
                    'orders.order_date',
                    'orders.status',
                    'customers.name as customer_name',
                    'customers.email as customer_email',
                    'orders.total_amount',
                    'orders.payment_method',
                    'orders.shipping_address',
                    'orders.billing_address',
                    'order_detail.product_id',
                    'product.product_name',  // Đảm bảo bạn có trường này
                    'product.image', // Đảm bảo bạn có trường này
                    'order_detail.quantity',
                    'order_detail.price',
                    'order_detail.total_price'
                )
                ->get()
                ->map(function ($order) {
                    $order->product_name = $order->product_name ?? 'No product';
                    $order->image = $order->image ?? 'No image';
                    return $order;
                });


            // Debug dữ liệu đơn hàng

            return view('Order.Orderlist', ['orders' => $orders]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to retrieve orders: ' . $e->getMessage());
        }
    }


    public function showOrderDetail($orderId)
    {
        try {
            $orderDetails = DB::table('order_detail')
                ->leftJoin('product', 'order_detail.product_id', '=', 'product.id')
                ->select(
                    'order_detail.quantity',
                    'order_detail.price',
                    'order_detail.total_price',
                    'product.product_name',
                    'product.image'
                )
                ->where('order_detail.order_id', $orderId)
                ->get()
                ->map(function ($detail) {
                    $detail->product_name = $detail->product_name ?? 'No product';
                    $detail->image = $detail->image ?? 'No image';
                    return $detail;
                });

            if ($orderDetails->isEmpty()) {
                return redirect()->back()->with('error', 'No products found for this order.');
            }

            $orders = DB::table('orders')
                ->leftJoin('customers', 'orders.customer_id', '=', 'customers.id')
                ->select(
                    'orders.id as order_id',
                    'orders.order_date',
                    'orders.status',
                    'customers.name as customer_name',
                    'customers.email as customer_email',
                    'orders.total_amount',
                    'orders.payment_method',
                    'orders.shipping_address',
                    'orders.billing_address'
                )
                ->where('orders.id', $orderId)
                ->get();

            return view('Order.Orderdetail', compact('orderDetails', 'orders'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to retrieve order details: ' . $e->getMessage());
        }
    }

    public function updateStatus(Request $request, $orderId)
    {
        try {
            DB::table('orders')->where('id', $orderId)->update(['status' => $request->status]);

            return redirect()->back()->with('success', 'Order status updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to update order status: ' . $e->getMessage());
        }
    }
}
