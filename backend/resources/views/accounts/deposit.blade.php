@extends('layouts.app')

@section('title', 'Deposit')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card border-dark">
              <div class="card-header bg-dark border-bottom-0 text-center">
                <i class="fa-solid fa-circle-dollar-to-slot fa-5x text-success"></i><br>
                <span class="h3 text-success">Deposit</span>
              </div>

              <div class="card-body bg-dark pt-1">
                  <form method="POST" action="{{ route('deposit.update') }}">
                      @csrf
                      @method('PATCH')

                      <div class="row mb-3">
                        <label for="account" class="col-md-4 col-form-label text-md-end text-white">Account</label>

                        <div class="col-md-6">
                          <select name="account" id="account" class="form-select" required>
                            <option value="" disabled selected style="display:none;">Select your account:</option>
                            @foreach ($all_accounts as $account)
                              <option value="{{ $account->id }}">{{ $account->id }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="deposit" class="col-md-4 col-form-label text-md-end text-white">Deposit Ammount</label>

                        <div class="col-md-6">
                          <div class="input-group">
                            <span class="input-group-text fw-bold">$</span>
                            <input id="deposit" type="number" class="form-control" name="deposit" step="0.01"
                              placeholder="Enter your Deposit ammount here" autofocus required aria-label="Amount (to the nearest dollar)">
                          </div>

                          @error('deposit')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>

                      <div class="row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-success w-100">
                                  Deposit
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
