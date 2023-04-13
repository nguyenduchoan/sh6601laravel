<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Helper\Cart;

class CartController extends Controller
{
    public function add($id, Cart $cart)
    {
        $product = Product::find($id);
        $quantity = request('quantity', 1);
        $quantity = $quantity > 0 ? $quantity : 1;
        // gọi phương thức add và truyền tham số tương ứng
        
        $cart->add($product, $quantity);
        // Chuyển hướng qua danh sách giỏ hàng
        return redirect()->route('cart.view');
    }

    public function delete($id, Cart $cart)
    {
        // gọi phương thức delete và truyền tham số tương ứng
        $cart->delete($id);
        // Chuyển hướng qua danh sách giỏ hàng
        return redirect()->route('cart.view');
    }

    public function update($id, Cart $cart)
    {
        // gọi phương thức update và truyền tham số tương ứng
        $quantity = request('quantity', 1);
        $quantity = $quantity > 0 ? $quantity : 1;
        $cart->update($id, $quantity);
        // Chuyển hướng qua danh sách giỏ hàng
        return redirect()->route('cart.view');
    }

    public function clear(Cart $cart)
    {
        // gọi phương thức clear
        $cart->clear();
        // Chuyển hướng qua danh sách giỏ hàng
        return redirect()->route('cart.view');
    }

    public function view(Cart $cart)
    {
        // Truyền dữ liệu qua view 'cart-view
        // dd($cart);
        return view('cart-view', compact('cart'));
    }
}
