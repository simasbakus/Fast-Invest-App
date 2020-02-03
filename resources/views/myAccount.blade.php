@extends('layouts.app')

@section('content')

    <h1>My Account</h1>
    <h3 class="py-3">Account Nr.: {{ Auth::user()->accountNr }}</h3>

    <h3 class="py-3">Balance: {{ Auth::user()->balance }} Eur</h3>

    <h3 class="py-3">My Transactions</h3>
    <div class="row">
      <div class="col-12">
        <div class="row my-1 text-center">
          <p class="col">From Name</p>
          <p class="col">From Account nr.</p>
          <p class="col">To Name</p>
          <p class="col">To Account nr.</p>
          <p class="col">Amount Eur</p>
          <p class="col">Date</p>
        </div>
        @foreach ($userTransactions as $userTransaction)
          @if ($userTransaction->fromAccountNr == Auth::user()->accountNr)
            <div class="row bg-danger my-1 text-center">
          @elseif ($userTransaction->toAccountNr == Auth::user()->accountNr)
            <div class="row bg-success my-1 text-center">
          @endif
              <h5 class="col">{{ $userTransaction->fromName }}</h5>
              <h5 class="col">{{ $userTransaction->fromAccountNr }}</h5>
              <h5 class="col">{{ $userTransaction->toName }}</h5>
              <h5 class="col">{{ $userTransaction->toAccountNr }}</h5>
              <h5 class="col">{{ $userTransaction->amount }}</h5>
              <h5 class="col">{{ $userTransaction->created_at }}</h5>
            </div>
        @endforeach
      </div>
    </div>


@endsection
