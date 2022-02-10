<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Orderlist;
use App\Models\Customer;
use App\Models\Ordermenu;
use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdermenuController extends Controller
{
    // Halaman Jumlah Order
    public function jumlah_order($menu_id)
    {
        $menu = Menu::find($menu_id);
        return view('pages.ordermenu.jumlah_order', compact('menu'));
    }

    // public function save_jumlah_order(Request $request, $menu_id)
    // {

    //     $ordermenu = new Ordermenu;
    //     $ordermenu->jumlah_order = $request->jumlah_order;
    //     $ordermenu->orderlist_id = NULL;
    //     $ordermenu->menu_id = $menu_id;
    //     $ordermenu->save();

    //     return redirect('/menu');
    // }

    // Menyimpan jumlah order ke dalam database
    public function save_jumlah_order(Request $request, $menu_id)
    {
        $menu = Menu::find($menu_id);
        $jumlah_order = $request->jumlah_order;

        // Check Available Stock
        if ($jumlah_order > $menu->stok) {
            return redirect()->route('menu')->with('notEnoughStock', 'Stock is not enough');
        }

        // Stock Update
        $menu->stok = $menu->stok - $jumlah_order;
        $menu->update();

        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($menu, $menu->menu_id, $jumlah_order);

        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));
        return redirect()->route('ordermenu');
    }

    // Menampilkan halaman ordermenu
    public function getCart()
    {
        if (!session()->has('cart')) {
            return redirect()->route('menu')->with('noIteminCart', 'No Items in Cart! Please add some items');
        }
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        return view('pages.ordermenu.ordermenu', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
    }

    // public function cancelOrdermenu(Request $request, $menu_id)
    // {
    //     $menu = Menu::find($menu_id);
    //     $request->session()->forget('cart', $menu->menu_id);
    //     return redirect()->route('menu');
    // }

    // Menghapus item dari cart
    public function deleteOrdermenu($menu_id)
    {
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($menu_id);

        if (count($cart->items) > 0) {
            session()->put('cart', $cart);
        } else {
            session()->forget('cart');
        }

        if (session()->has('cart')) {
            return redirect()->route('ordermenu');
        } else {
            return redirect()->route('menu');
        }
    }

    // Invoice OrderMenu
    public function invoice()
    {
        $orderlist_id = DB::selectOne("select getCurrentId('orderlist') as value from dual")->value;
        $customer_name = session()->get('username');
        $customer_address = session()->get('customer_address');
        $tanggal_pemesanan = date("Y-m-d");
        if (!session()->has('cart')) {
            return redirect()->route('menu')->with('noIteminCart', 'No Items in Cart! Please add some items');
        }
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        return view('pages.ordermenu.invoice', ['customer_address' => $customer_address, 'customer_name' => $customer_name, 'order_date' => $tanggal_pemesanan, 'orderlist_id' => $orderlist_id, 'products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
    }

    // Konfirmasi Pembayaran Order oleh Customer`pada halaman Invoice
    public function confirmPaymentCustomer($totalPrice)
    {
        $customer_user_id = session()->get('user_id');
        $customer = Customer::find($customer_user_id);

        // Saldo check 
        if ($customer->saldo < $totalPrice) {
            return redirect()->route('ordermenu')->with('notEnoughSaldo', 'Saldo is not enough');
        }

        $customer->saldo = $customer->saldo - $totalPrice;
        $customer->update();


        $orderlist_id = session()->get('orderlist_id_confirm');
        $orderlist = Orderlist::find($orderlist_id);
        $orderlist->status_proses = 'Payment Pending';
        $orderlist->update();
        return redirect()->route('invoice_csv_download')->with('confirmPaymentCustomer', 'Payment Success! Please wait for the driver to confirm your order!');
    }

    // Invoice Sementara setelah customer melakukan pembayaran
    public function invoice_csv_download()
    {
        $orderlist_id = DB::selectOne("select getCurrentId('orderlist') as value from dual")->value;
        $customer_name = session()->get('username');
        $customer_address = session()->get('customer_address');
        $tanggal_pemesanan = date("Y-m-d");
        if (!session()->has('cart')) {
            return redirect()->route('menu')->with('noIteminCart', 'No Items in Cart! Please add some items');
        }
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);

        session()->forget('cart');
        return view('pages.ordermenu.invoice_csv_download', ['customer_address' => $customer_address, 'customer_name' => $customer_name, 'order_date' => $tanggal_pemesanan, 'orderlist_id' => $orderlist_id, 'products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
    }

    // Sales record Page for particular customer
    public function sales_record()
    {
        $orderlist = DB::table('orderlist')->get();
        $customer_user_id = session()->get('user_id');
        // Get Driver Name
        return view('pages.ordermenu.sales_record', compact('orderlist', 'customer_user_id'));
    }

    // Sales Record with Invoice Page for particular orderlist
    public function detail_sales_record($orderlist_id)
    {
        $products = DB::select('select * from ordermenu inner join menu on ordermenu.menu_id = menu.menu_id
        where ordermenu.orderlist_id = ' . $orderlist_id);
        $orderlist = Orderlist::find($orderlist_id);
        $customer_user_id = session()->get('user_id');
        $customer_name = session()->get('username');
        $customer_address = session()->get('customer_address');
        $order_date = $orderlist->order_date;
        // dd($products);
        return view('pages.ordermenu.detail_sales_record', compact('customer_name', 'customer_user_id', 'customer_address', 'order_date', 'products', 'orderlist_id'));
    }
}
