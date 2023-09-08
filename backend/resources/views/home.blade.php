@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div> --}}
        <div class="col-md-8">
            <span class="display-6 text-white">Good day, User!</span>
        </div>
    </div>
    <div class="row justify-content-center mt-5 pb-3">
        <div class="col-md-8">
            <div class="card border-0">
                <div class="card-header border-0 bg-info fw-bold rounded-top">
                    Announcements
                </div>
                <div class="card-body">
                    Welcom to Kredo Bank!
                </div>
            </div>
            <div class="row mt-3 text-center">
                <div class="col-4 pe-1">
                    <a href="{{ route('deposit.edit', Auth::user()->id) }}" class="text-decoration-none">
                        <div class="rounded bg-success text-white p-3">
                            <p class="h3 mb-3">Deposit</p>
                            <i class="fa-solid fa-circle-dollar-to-slot fa-5x"></i>
                        </div>
                    </a>
                </div>
                <div class="col-4 px-2">
                    <a href="{{ route('withdraw.edit', Auth::user()->id) }}" class="text-decoration-none">
                        <div class="rounded bg-danger text-white p-3">
                            <p class="h3 mb-3">Withdraw</p>
                            <i class="fa-solid fa-money-bill-wave fa-5x"></i>
                        </div>
                    </a>
                </div>
                <div class="col-4 ps-1">
                    <a href="{{ route('account.index', Auth::user()->id) }}" 
                        class="text-decoration-none">
                        <div class="rounded bg-secondary text-white p-3">
                            <p class="h3 mb-3">Accounts</p>
                            <i class="fa-solid fa-money-check-dollar fa-5x"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
