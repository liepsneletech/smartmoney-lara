<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('show-accounts');
        } else {
            return redirect()->route('show-login');
        }
    }

    public function showAccounts()
    {
        $pageTitle = 'Sąskaitų sąrašas';
        $accounts = Account::all()->sortBy('surname');
        return view('back.accounts', compact('pageTitle', 'accounts'));
    }

    public function createAccount()
    {
        $pageTitle = 'Sąskaitos kūrimas';
        $accounts = Account::all();
        return view('back.create-account', compact('pageTitle', 'accounts'));
    }

    public function saveAccount(Request $request, Account $account)
    {

        $incomingFields = $request->validate(
            [
                'name' => ['required', 'min:3', 'regex:/^([a-zA-ZąčęėįšųūžĄČĘĖĮŠŲŪŽ]+([\s]?[a-zA-ZąčęėįšųūžĄČĘĖĮŠŲŪŽ]+|[\']?[a-zA-ZąčęėįšųūžĄČĘĖĮŠŲŪŽ]*)){4,}$/'],
                'surname' => ['required', 'min:3', 'regex:/^([a-zA-ZąčęėįšųūžĄČĘĖĮŠŲŪŽ]+([\s]?[a-zA-ZąčęėįšųūžĄČĘĖĮŠŲŪŽ]+|[\']?[a-zA-ZąčęėįšųūžĄČĘĖĮŠŲŪŽ]*)){4,}$/'],
                'personal-number' => ['required', 'regex:/^[1-6]\d{2}(0[1-9]|1[0-2])(0[1-9]|[12][0-9]|3[01])\d{4}$/', 'unique:accounts,personal-number']
            ],
            [
                'name.required' => 'Vardo laukelis negali būti tuščias!',
                'name.min' => 'Vardas negali būti trumpesnis nei 3 simboliai!',
                'name.regex' => 'Įrašykite validų vardą!',
                'surname.required' => 'Vardo laukelis negali būti tuščias!',
                'surname.min' => 'Pavardė negali būti trumpesnė nei 3 simboliai!',
                'surname.regex' => 'Įrašykite validžią pavardę!',
                'personal-number.required' => 'Asmens kodo laukelis privalomas!',
                'personal-number.regex' => 'Įrašykite validų asmens kodą!',
                'personal-number.unique' => 'Toks asmens kodas jau užregistruotas!'
            ]
        );

        $incomingFields['iban'] = $request->iban;
        $incomingFields['balance'] = 0;

        Account::create($incomingFields);
        return redirect()->route('show-accounts');
    }


    public function showAddMoney(Account $account)
    {
        $pageTitle = 'Lėšų pridėjimas';
        return view('back.add-money', compact('account', 'pageTitle'));
    }

    public function addMoney(Request $request, Account $account)
    {
        $incomingFields = $request->validate(
            [
                'balanceAdd' => ['required', 'regex:/^(?:[0-9]*[.])?[0-9]+$/', 'not_in:0']
            ],
            [
                'balanceAdd.required' => 'Sumos laukelis negali būti tuščias!',
                'balanceAdd.regex' => 'Įrašykite validžią sumą!',
                'balanceAdd.not_in' => 'Suma negali būti lygi nuliui!'
            ]
        );

        $account->balance +=  $incomingFields['balanceAdd'];
        $account->update($incomingFields);

        return redirect()->route('show-accounts')->with('success-add', 'Sėkmingai pridėjote lėšų!');
    }

    public function showWithdrawMoney(Account $account)
    {
        $pageTitle = 'Lėšų nuėmimas';
        return view('back.withdraw-money', compact('account', 'pageTitle'));
    }

    public function withdrawMoney(Request $request, Account $account)
    {

        $incomingFields = $request->validate(
            [
                'balanceWithdraw' => ['required', 'regex:/^(?:[0-9]*[.])?[0-9]+$/', 'not_in:0']
            ],
            [
                'balanceWithdraw.required' => 'Sumos laukelis negali būti tuščias!',
                'balanceWithdraw.regex' => 'Įrašykite validžią sumą!',
                'balanceWithdraw.not_in' => 'Suma negali būti lygi nuliui!'
            ]
        );

        if ($incomingFields['balanceWithdraw'] > $account->balance) {
            return redirect()->back()->with('error-withdraw', 'Negalima minusuoti sumos, didesnės už turimas lėšas!');
        }

        $account->balance -=  $incomingFields['balanceWithdraw'];
        $account->update($incomingFields);

        return redirect()->route('show-accounts')->with('success-withdraw', 'Sėkmingai minusavote lėšas!');
    }

    public function deleteAccount(Account $account)
    {
        if ($account->balance > 0) {
            return redirect()->back()->with('error-delete-account', 'Sąskaitos, kurioje yra lėšų, ištrinti negalima.');
        }
        $account->delete();
        return redirect()->back()->with('success-delete', 'Sėkmingai ištrynėte sąskaitą!');
    }
}