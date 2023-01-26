@extends('components.layout')

@section('content')
    <main class="container">
        <div class="main-inner">
            <h1 class="main-title">Įnešti lėšų į sąskaitą</h1>
            <form action="{{ route('add-money', $account) }}" method="post" class="money-operation-box">
                @csrf
                @method('PUT')

                @error('balanceAdd')
                    <p class="error-red">{{ $message }}</p>
                @enderror

                <p class="full-name">
                    <?= $account['name'] . ' ' . $account['surname'] ?></p>
                <strong>Sąskaitos likutis: <?= number_format($account['balance'], 2, ',', ' ') ?> &euro;</strong>
                <input type="text" name="balanceAdd" placeholder="Įrašykite sumą" value="{{ old('balanceAdd') }}">
                <button type="submit" class="btn-main btn-green" name="add">PATVIRTINTI</button>
                <div class="img-box"><img src="/assets/img/add-money-pic.png" alt="Add money" class="add-money-pic">
                </div>
            </form>
        </div>
    </main>
@endsection
