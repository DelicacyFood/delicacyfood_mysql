<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Models\History_Topup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function topup()
    {
        return view('pages.topup.topup');
    }

    public function history_topup()
    {
        $historytopup = DB::table('history_topup')->get();
        return view('pages.topup.history_topup', compact('historytopup'));
    }

    // Masukkin topup ke history_topup
    public function isi_saldo(Request $request)
    {
        $credentials = $request->validate([
            'saldo' => 'required',
        ]);
        $tanggal_topup = date("Y-m-d");

        // History_Topup
        $history_topup = new History_Topup;
        $history_topup->history_topup_id = DB::selectOne("select getNewId('history_topup') as value from dual")->value;
        $history_topup->customer_user_id = session()->get('user_id');
        $history_topup->tanggal_topup = $tanggal_topup;
        $history_topup->status_topup = 'Pending';
        $history_topup->jumlah_topup = $credentials['saldo'];

        $history_topup->save();

        return redirect()->route('dashboard')->with('successTopUp', 'Top up Success! Please wait for cashier approval');
    }


    // Store ke Saldo Customer
    public function store_saldo($saldo, $topup_id, $customer_user_id)
    {
        $history = DB::select('select status_topup from history_topup where history_topup_id = ?', [$topup_id]);
        $status_topup = $history[0]->status_topup;
        if ($status_topup == 'Pending') {
            $user_id_customer = $customer_user_id;
            $username_customer = DB::selectOne("select getUsername('$customer_user_id') as value from dual")->value;
            $saldo_customer = $saldo;

            // $customer = DB::selectOne("select topupSaldo('$username_customer','$saldo_customer','$user_id_customer') as value from dual")->value;
            // $customer = DB::select("call topupSaldo('$username_customer','$saldo_customer','$user_id_customer')");
            $customer = DB::selectOne("select topupSaldo_func('$username_customer','$saldo_customer','$user_id_customer') as value from dual")->value;
            // dd($customer);
            // $procedureName = 'topupSaldo';

            // $bindings = [
            //     'username_in'  => $username_customer,
            //     'saldo_in'  => $saldo_customer,
            //     'user_id_in' => $user_id_customer,
            // ];

            // DB::executeProcedure($procedureName, $bindings);

            $history_topup = History_Topup::find($topup_id);
            // dd($history_topup);
            $history_topup->status_topup = 'Top up Completed';
            $history_topup->update();
        }

        return redirect('pages/history_topup')->with('topUpConfirmed', 'Top up Confirmed!');
    }
}
