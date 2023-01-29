{{-- if($request->s && $request->s !== '') {
$accounts = Account::search($request->s);
} else {
$accounts = Account::where('id', '>', 0);

$accounts = match($request->filter ?? '') {
'with-money' => $accounts->where('money', '>', 0),
'no-money' => $accounts->where('money', '=', 0),
default => $accounts,
};

$accounts = match($request->sort ?? '') {
'asc_lastname' => $accounts->orderBy('lastname')->orderBy('firstname'),
'desc_lastname' => $accounts->orderBy('lastname', 'desc')->orderBy('firstname', 'desc'),
'asc_firstname' => $accounts->orderBy('firstname')->orderBy('lastname'),
'desc_firstname' => $accounts->orderBy('firstname', 'desc')->orderBy('lastname', 'desc'),
'asc_money' => $accounts->orderBy('money')->orderBy('lastname'),
'desc_money' => $accounts->orderBy('money', 'desc')->orderBy('lastname'),
'desc_id' => $accounts->orderBy('id', 'desc'),
default => $accounts->orderBy('id'),
};
}

$accounts = $accounts->paginate(7)->withQueryString();

$pageTitle = 'Sąskaitų sąrašas';
$isActive = 'accounts';
$sortOptions = Account::SORT;
$currentSortOption = isset(Account::SORT[$request->sort]) ? $request->sort : 'asc_id';
$filterOptions = Account::FILTER;
$currentFilterOption = isset(Account::FILTER[$request->filter]) ? $request->filter : 'all';
$currentSearchTerm = isset($request->s) ? $request->s : '';

return view('back.pages.accounts', compact('pageTitle', 'isActive', 'accounts', 'request', 'sortOptions',
'currentSortOption', 'filterOptions', 'currentFilterOption', 'currentSearchTerm'));







<section class="filters-container flex flex-col">
    <form action="{{ route('show-accounts') }}" method="get" class="filter-form flex">
        <div class="filter-form-inputs flex">
            <label for="sort">Rikiuoti:</label>
            <select name="sort" id="sort" class="sort">
                @foreach ($sortOptions as $name => $value)
                    <option value="{{ $name }}" @if ($currentSortOption === $name) selected @endif>
                        {{ $value }}
                    </option>
                @endforeach
            </select>

            <label for="filter">Filtruoti:</label>
            <select name="filter" id="filter" class="filter">
                <option value="all">Visos</option>
                @foreach ($filterOptions as $name => $value)
                    <option value="{{ $name }}" @if ($currentFilterOption === $name) selected @endif>
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="filter-form-btns flex">
            <button type="submit" class="btn btn-small">
                <i class="fa-solid fa-arrow-right"></i>
            </button>
            <button type="reset" class="btn brn-small btn-gray">
                <i class="fa-solid fa-rotate"></i>
            </button>
        </div>
    </form>

    <form action="{{ route('show-accounts') }}" method="get" class="search-form flex">
        <input value="@if (isset($accounts) && count($accounts) === 0) {{ $currentSearchTerm }} @endif" type="text" name="s"
            class="search" placeholder="Ieškoti sąskaitos...">
        <button type="submit" class="search-btn btn">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </form>
</section> --}}
