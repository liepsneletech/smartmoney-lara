@extends('components.layout')

@section('content')
    <main class="container">
        <div class="main-inner">
            <h1 class=" main-title">Sąskaitų sąrašas</h1>

            @if (session()->has('success-new-account'))
                <p class="success-green">{{ Session::get('success-new-account') }}</p>
            @endif

            @if (session()->has('success-delete'))
                <p class="success-green">{{ Session::get('success-delete') }}</p>
            @endif

            @if (session()->has('error-delete-account'))
                <p class="error-red">{{ Session::get('error-delete-account') }}</p>
            @endif

            <div class="filters-container">
                <form class="filter-form">
                    <div>
                        <label for="sort" class="filters-label">Rikiuoti:</label>
                        <select name="sort" id="sort" class="filter-select">

                            @foreach ($sortSelect as $value => $name)
                                <option value="{{ $value }}" @if ($sortShow == $value) selected @endif>
                                    {{ $name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="filter" class="filters-label">Filtruoti sąskaitas:</label>
                        <select name="filter" id="filter"class="filter-select">

                            <option>Visos</option>
                            @foreach ($filterSelect as $value => $name)
                                <option value="{{ $value }}" @if ($filterShow == $value) selected @endif>
                                    {{ $name }}</option>
                            @endforeach


                        </select>

                        <button class="btn-main btn-green search-btn filter-btn" type="submit"><i
                                class="fa-solid fa-arrow-right"></i></button>
                        <a href="{{ route('show-accounts') }}" class="btn-main btn-green search-btn filter-btn reset-btn"><i
                                class="fa-solid fa-arrows-rotate"></i></a>
                    </div>
                </form>

                <form class="search-form" action="{{ route('show-accounts') }}">
                    <input type="text" placeholder="Ieškoti..." class="search-input" name="s"
                        value="@if (isset($accounts) && count($accounts) === 0) {{ $searchTerm }} @endif">
                    <button class="btn-main btn-green search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>

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
            <div class="pagination-container">
                {{-- <form class="results-form">
                    @csrf
                    <p class="results-text">Puslapyje rodyti rezultatų:</p>
                    <select name="per_page" id="pagination-results" class="filter-select" onchange="this.form.submit()">
                        @foreach ($perPageSelect as $value)
                            <option value="{{ $value }}" @if ($perPage = $perPageShow == $value) selected @endif>
                                {{ $value }}</option>
                        @endforeach
                    </select>
                </form> --}}
                {{ $accounts->links() }}

            </div>

        </div>
    </main>
@endsection
