<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    private $account;

    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        $all_accounts = $this->account
                            ->where('user_id', $user_id)
                            ->orderBy('id')
                            ->get();

        return view("accounts.index")->with('all_accounts', $all_accounts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id)
    {
        $request->validate([
            'balance' => 'required|between:0,999999999999999999999999999999999999999999999999.99'
        ]);

        $this->account->user_id = $user_id;
        $this->account->balance = $request->balance;
        $this->account->save();

        return redirect()->route('account.index', $user_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function depositEdit($user_id)
    {
        $all_accounts = $this->account
                            ->where('user_id', $user_id)
                            ->orderBy('id')
                            ->get();

        return view("accounts.deposit")->with('all_accounts', $all_accounts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function depositUpdate(Request $request)
    {
        $request->validate([
            'account' => 'required|numeric|min:1',
            'deposit' => 'required|between:0,999999999999999999999999999999999999999999999999.99'
        ]);

        $account = $this->account->findOrFail($request->account);
        $account->balance += $request->deposit;
        $account->save();

        return redirect()->route('account.index', $account->user_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function withdrawEdit($user_id)
    {
        $all_accounts = $this->account
                            ->where('user_id', $user_id)
                            ->orderBy('id')
                            ->get();

        return view("accounts.withdraw")->with('all_accounts', $all_accounts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function withdrawUpdate(Request $request)
    {
        $request->validate([
            'account' => 'required|numeric|min:1',
            'withdraw' => 'required|between:0,999999999999999999999999999999999999999999999999.99'
        ]);

        $account = $this->account->findOrFail($request->account);
        // TODO
        if ($account->balance < $request->withdraw) {
            $request->validator->errors()->add('withdraw', 'Your current account balance is : $ ' . $account->balance);
            return redirect()->route('withdraw.edit', $account->user_id);
        }
        $account->balance -= $request->withdraw;
        $account->save();

        return redirect()->route('account.index', $account->user_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
