@extends('layouts.app')

@section('content')

    <h1>New Transaction</h1>

    <form class="py-4" action="transaction" method="post">
      <div class="form-group">
        <label for="recipient-name">Recipient Name</label>
        <input type="text" name="recipient-name" value="{{ old('recipient-name') }}" class="form-control">
        <div>
          {{ $errors->first('recipient-name') }}
        </div>
      </div>
      <div class="form-group">
        <label for="recipient-lname">Recipient Last Name</label>
        <input type="text" name="recipient-lname" value="{{ old('recipient-lname') }}" class="form-control">
        <div>
          {{ $errors->first('recipient-lname') }}
        </div>
      </div>
      <div class="form-group">
        <label for="recipient-accountnr">Recipient Account Nr.</label>
        <input type="text" name="recipient-account-nr" value="{{ old('recipient-account-nr') }}" class="form-control">
        <input type="hidden" name="sender-account-nr" value="{{ Auth::user()->accountNr }}" class="form-control">
        <div>
          {{ $errors->first('recipient-account-nr') }}
        </div>
      </div>
      <div class="form-group">
        <label for="amount">Amount</label>
        <input type="text" name="amount" value="{{ old('amount') }}" class="form-control">
        <div>
          {{ $errors->first('amount') }}
        </div>
      </div>
      <div class="form-group">
        <label for="purpose">Purpose of Transaction</label>
        <textarea name="purpose" rows="4" cols="40" class="form-control">{{ old('purpose') }}</textarea>
        <div>
          {{ $errors->first('purpose') }}
        </div>
      </div>
      <button type="submit" name="button" class="btn btn-success">Send</button>
      @csrf
    </form>

@endsection
