@extends('layouts.app')

@section('title', 'Withdraw')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card border-dark">
              <div class="card-header bg-dark border-bottom-0 text-center">
                <i class="fa-solid fa-money-bill-wave fa-5x text-danger"></i><br>
                <span class="h3 text-danger">Withdrawal</span>
              </div>

              <div class="card-body bg-dark pt-1">
                  <form method="POST" action="{{ route('withdraw.update') }}">
                      @csrf
                      @method('PATCH')

                      <div class="row mb-3">
                        <label for="account" class="col-md-4 col-form-label text-md-end text-white">Account</label>

                        <div class="col-md-6">
                          @foreach ($all_accounts as $account)
                            <input type="radio" class="btn-check" name="account" id="account-{{ $account->id }}" value="{{ $account->id }}">
                            <label class="btn btn-danger" for="account-{{ $account->id }}">{{ $account->id }}</label>
                          @endforeach
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="withdraw" class="col-md-4 col-form-label text-md-end text-white">Withdraw Ammount</label>

                        <div class="col-md-6">
                          <div class="input-group">
                            <span class="input-group-text fw-bold">$</span>
                            <input id="withdraw" type="number" class="form-control" name="withdraw" step="0.01"
                              placeholder="Enter your Withdrawal ammount here" autofocus required aria-label="Amount (to the nearest dollar)">
                          </div>

                          @error('withdraw')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>

                      <div class="row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-danger w-100">
                                Withdraw
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
