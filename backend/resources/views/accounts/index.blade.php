@extends('layouts.app')

@section('title', 'Accounts')

@section('content')
  <div class="container-fluid bg-white mb-3">
    <div class="row mx-auto w-25 mt-5">
      <div class="col h3 fw-bold">
        Account<br>
        List
      </div>
      <div class="col text-end">
        <a href="{{ route('account.create') }}" 
          class="text-decoration-none">
          <i class="fa-solid fa-square-plus text-primary fa-3x"></i>
        </a>
      </div>
    </div>
    @foreach ($all_accounts as $account)
        <div class="row mx-auto w-25 my-3">
          <div class="col w-100 shadow">
            <div class="h5 fw-bold">SAVINGS ACCOUNT</div>
            <div class="text-muted">{{ $account->id }}</div>
            <div class="h5 fw-bold text-end">$ {{ number_format($account->balance, 2) }}</div>
            <div class="text-muted text-end">Available Balance</div>
          </div>
        </div>
    @endforeach
  </div>
@endsection