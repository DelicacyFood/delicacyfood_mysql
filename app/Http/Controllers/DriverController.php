<?php

namespace App\Http\Controllers;

use App\Models\Orderlist;
use App\Models\Driver;
use App\Cart;
use App\Models\Ordermenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DriverController extends Controller
{
    public function driver_page()
    {
        $orderlist = DB::table('orderlist')->get();
        // Get Driver Name
        return view('pages.driver.driver_page', compact('orderlist'));
    }

    public function detailDriver($orderlist_id)
    {
        $products = DB::select('select * from ordermenu inner join menu on ordermenu.menu_id = menu.menu_id
        where ordermenu.orderlist_id = ' . $orderlist_id);
        // dd($products);
        return view('pages.driver.detaildriver', compact('products', 'orderlist_id'));
    }

    public function deliveryConfirm($orderlist_id)
    {
        // dd(session()->get('user_id'));
        $orderlist = Orderlist::find($orderlist_id);
        $orderlist->status_proses = 'Order Delivered';
        $orderlist->driver_id = session()->get('user_id');
        $orderlist->update();
        return redirect()->route('driver_page')->with('confirmDelivered', 'Order Delivered! Please Check Your Orderlist');
    }
}
