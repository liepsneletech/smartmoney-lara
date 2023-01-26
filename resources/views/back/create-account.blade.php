    <?php
    
    function generateIBAN($accounts, string $IBAN = ''): string
    {
        $IBAN = 'LT' . ' ' . rand(0, 9) . rand(0, 9) . ' ' . '0014' . ' ' . '7' . rand(0, 9) . rand(0, 9) . rand(0, 9) . ' ' . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . ' ' . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
        foreach ($accounts as $account) {
            if ($account['iban'] == $IBAN) {
                generateIBAN($accounts, $IBAN);
            }
        }
        return $IBAN;
    }
    ?>

    @extends('components.layout')

    @section('content')
        <main class=" container">
            <div class="main-inner">
                <h1 class="main-title">Sukurti sąskaitą</h1>

                <form class="registration-form" action="{{ route('save-account') }}" method="post">
                    @csrf

                    <input type="text" id="name" placeholder="Vardas*" name="name" value="{{ old('name') }}">
                    @error('name')
                        <p class="error-red">{{ $message }}</p>
                    @enderror

                    <input type="text" id="surname" placeholder="Pavardė*" name="surname" value="{{ old('surname') }}">

                    @error('surname')
                        <p class="error-red">{{ $message }}</p>
                    @enderror

                    <input type="text" id="personal-number" placeholder="Asmens kodas*" name="personal-number"
                        value="{{ old('personal-number') }}">
                    @error('personal-number')
                        <p class="error-red">{{ $message }}</p>
                    @enderror

                    <input type="text" id="iban" placeholder="IBAN*" name="iban"
                        value="<?= generateIBAN($accounts) ?>" readonly>

                    <button type="submit" name="submit" class="btn-main btn-green"><i
                            class="fa-solid fa-user-plus add-person-icon"></i> SUKURTI
                    </button>
                </form>
            </div>
        </main>
    @endsection
