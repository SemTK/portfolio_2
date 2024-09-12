# 👓 Conventions

- These are the code conventions that will be put to use in this project.

- A space convention of 4 spaces will be used throughout the project. as such;

```html
<header>
    <h1>Test</h1>
</header>
```

- Between each component used in the blade files a whitespace will be used to create a more organized environment.

- Controllers and Models Will be written with UpperCamelCase.

- Each functions in the Controllers and Models will be seperated by a whitespace.

- All functions in the Controllers and/or Models will be written under their declaration. Like so;

```php
    public function viewHomePage(){
        return view('home');
    }
```

- Each unfinished funtion will have a "to-do" tag commented above it.

- Each function which requires some depth of explanation will have the correct explanation included. Like so;

```php
    // Gathering all existing bankaccounts and sending that data to the view.
    public function viewDetailedFinancesPage(){
        $allBankaccounts = Bankaccount::all();

        return view('detailed-finances',[
            "bankaccounts" => $allBankaccounts,
        ]);
    }
```

- All routes will be sorted by subject, to create more organization. Like so;

```php

// Bankaccount Routes

Route::get('/bankaccount/loan-request/request', [PagesController::class, 'viewLoanRequestPage'])->name('loan-request-form')->middleware('auth');

Route::post('/bankaccount/create', [AccountsController::class, 'createBankaccount'])->name('create-bank-account')->middleware('auth');

```
- Routes are to be given a name to cause easier use.

- When possible resource routes will be used to make use of Laravel's built-in index, create, update and delete functions.

- TailwindCSS is the choice of styling for this project. And is loaded in through the base layouts.



