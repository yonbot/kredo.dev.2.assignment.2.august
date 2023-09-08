@extends('layouts.app')

@section('title', 'Create Accounts')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card border-dark">
              <div class="card-header bg-dark border-bottom-0 text-center">
                <i class="fa-solid fa-money-bills fa-5x text-primary"></i><br>
                <span class="h3 text-primary">New Account</span>
              </div>

              <div class="card-body bg-dark pt-1">
                  <form method="POST" action="{{ route('account.store', Auth::user()->id) }}">
                      @csrf

                      <div class="row mb-3">
                        <label for="balance" class="col-md-4 col-form-label text-md-end text-white">Initial Balance</label>

                        <div class="col-md-6">
                          <div class="input-group">
                            <span class="input-group-text fw-bold">$</span>
                            <input id="balance" type="number" class="form-control" name="balance" step="0.01"
                              placeholder="Enter your Initial Balance here" autofocus required aria-label="Amount (to the nearest dollar)">
                          </div>

                          @error('balance')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>

                      <div class="row mb-0">
                          <div class="col-md-6 offset-md-4 text-end">
                              <button type="submit" class="btn btn-primary">
                                  Create
                              </button>
                              <a href="{{ route('account.index', Auth::user()->id) }}" 
                                class="btn btn-secondary ms-2">Cancel</a>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
