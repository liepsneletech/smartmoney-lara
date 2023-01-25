@extends('components.layout')

@section('content')
    <main class="container ">
        <div class="main-inner">
            <h1 class="main-title">Išimti lėšų iš sąskaitos</h1>
            <form action="{{ route('withdraw-money', $account) }}" method="post" class="money-operation-box">
                @csrf
                @method('PUT')

                @error('balanceWithdraw')
                    <p class="error-red">{{ $message }}</p>
                @enderror

                @if (session()->has('error-withdraw'))
                    <p class="error-red">{{ Session::get('error-withdraw') }}</p>
                @endif

                <p class="full-name">
                    <?= $account['name'] . ' ' . $account['surname'] ?></p>
                <strong>Sąskaitos likutis: <?= number_format($account['balance'], 2, ',', ' ') ?> &euro;</strong>
                <input type="text" name="balanceWithdraw" placeholder="Įrašykite sumą">
                <button type="submit" class="btn-main btn-yellow" name="withdraw">PATVIRTINTI</button>
                <div class="img-box"><img src="/assets/img/withdraw-money-pic.png" alt="Withdraw money"
                        class="withdraw-money-pic">
                </div>
            </form>
        </div>
    </main>
@endsection
