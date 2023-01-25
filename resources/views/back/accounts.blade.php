@extends('components.layout')

@section('content')
    <main class="container">
        <div class="main-inner">
            <h1 class=" main-title">Sąskaitų sąrašas</h1>

            @if (session()->has('success-add'))
                <p class="success-green">{{ Session::get('success-add') }}</p>
            @endif


            @if (session()->has('success-withdraw'))
                <p class="success-green">{{ Session::get('success-withdraw') }}</p>
            @endif

            @if (session()->has('success-delete'))
                <p class="success-green">{{ Session::get('success-delete') }}</p>
            @endif

            @if (session()->has('error-delete-account'))
                <p class="error-red">{{ Session::get('error-delete-account') }}</p>
            @endif

            <div>
                <?php foreach ($accounts as $account) : ?>
                <div class="account-info-box">
                    <p class="id-number">&#35;<?= $account['id'] ?></p>
                    <p class="full-name"><i class="fa-solid fa-account-large person-icon"></i>
                        <?= $account['name'] . ' ' . $account['surname'] ?></p>
                    <div>
                        <p><span class="personal-number-abbr">A.k.: </span><?= $account['personal-number'] ?></p>
                        <p class="iban"><?= $account['iban'] ?></p>
                    </div>

                    <div class="accounts-right-box">
                        <p class="balance"><?= number_format($account['balance'], 2, ',', ' ') ?> &euro;</p>
                        <div class="accounts-btns">
                            <a href="{{ route('show-add-money', $account['id']) }}" class="accounts-btn btn-green"><i
                                    class="fa-solid fa-plus"></i></a>

                            <a href="{{ route('show-withdraw-money', $account) }}" class="accounts-btn btn-yellow"><i
                                    class="fa-solid fa-minus"></i></a>

                            <form action="{{ route('delete-account', $account) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="accounts-btn btn-red" name="error-delete"><i
                                        class="fa-solid fa-x"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <?php endforeach ?>
            </div>

        </div>
    </main>
@endsection
