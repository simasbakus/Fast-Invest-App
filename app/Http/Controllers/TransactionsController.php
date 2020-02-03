<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\User;
use App\Events\NewTransactionCreatedEvent;


class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userTransactions = Transaction::orderBy('id', 'DESC')
                ->where('fromAccountNr', auth()->user()->accountNr)
                ->orWhere('toAccountNr', auth()->user()->accountNr)
                ->get();

        return view('myAccount', compact('userTransactions'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userBalance = auth()->user()->balance;
        $data = request()->validate([
          'recipient-name' => 'required',
          'recipient-lname' => 'required',
          'recipient-account-nr' => "required|min:15|max:15|exists:users,accountNr|different:sender-account-nr",
          'amount' => "required|gt:0|max:$userBalance",
          'purpose' => 'required',
        ]);

        $transaction = new Transaction();
        $transaction->fromName = auth()->user()->name;
        $transaction->fromLname = auth()->user()->lname;
        $transaction->fromAccountNr = auth()->user()->accountNr;
        $transaction->toName = request('recipient-name');
        $transaction->toLname = request('recipient-lname');
        $transaction->toAccountNr = request('recipient-account-nr');
        $transaction->amount = request('amount');
        $transaction->purpose = request('purpose');
        $transaction->save();

        event(new NewTransactionCreatedEvent($transaction));

        return redirect('my-account');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
