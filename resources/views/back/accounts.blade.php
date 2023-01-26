@extends('components.layout')

@section('content')
    <main class="container">
        <div class="main-inner">
            <h1 class=" main-title">Sąskaitų sąrašas</h1>
            <div class="filters-container">
                <form>
                    <select name="sort" id="sort">
                        @foreach ($sortSelect as $value => $name)
                            <option value="{{ $value }}" @if ($sortShow == $value) selected @endif>
                                {{ $name }}</option>
                        @endforeach
                    </select>

                    <select name="filter" id="filter">

                    </select>
                </form>

                <form>
                    <input type="text" placeholder="Ieškoti...">
                    <button>Ieškoti</button>
                </form>
            </div>


            @if (session()->has('success-delete'))
                <p class="success-green">{{ Session::get('success-delete') }}</p>
            @endif

            @if (session()->has('error-delete-account'))
                <p class="error-red">{{ Session::get('error-delete-account') }}</p>
            @endif



            <div>
                <?php foreach ($accounts as $account) : ?>
                <div class="account-info-box" id="{{ $account['id'] }}">
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


                @if (session()->has('account-id') && session('account-id') == $account['id'])
                    <p class="success-green">{{ Session::get('success') }}</p>
                @endif


                <?php endforeach ?>

            </div>

        </div>
    </main>
@endsection
