<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Orderlist;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    // Controller Main Page
    public function index()
    {
        return view('start');
    }

    public function menu()
    {
        $menu = DB::table('menu')->get();
        // dd($menu);
        $category_name = [];
        $i = 0;
        foreach ($menu as $m) {
            $category_id = $m->category_id;
            $category_name[$i] = DB::selectOne("select getCategoryName('$category_id') as value from dual")->value;
            $i++;
        }
        return view('menu', compact('menu', 'category_name'));
    }

    // Controller Modules
    public function sweetalert()
    {
        return view('modules.sweet-alert');
    }

    // Controller Pages
    public function dashboard()
    {
        if (session()->has('hasLogin')) {
            $customer = DB::selectOne("select totalCustomers() as value from dual");
            $saldo = DB::table('customer')->get();
            $sales = DB::selectOne("select numberOfOrders() as value from dual");
            // $users = DB::table('users')->get();
            return view('pages.dashboard', compact('customer', 'sales'));
        } else {
            echo "<script>alert('Anda harus login terlebih dahulu');</script>";
            return redirect()->route('start');
        }
    }

    public function home()
    {
        // $user = DB::selectOne("select ('orderlist') as value from dual");
        // $totalBayar = DB::selectOne("select hitungTotalBayar(1) as value from dual");
        // $users = DB::table('users')->get();
        $users = Orderlist::all();
        return view('pages.home', compact('users'));
    }

    public function credits()
    {
        return view('pages.credits');
    }

    public function faq()
    {
        return view('pages.faq');
    }
}
