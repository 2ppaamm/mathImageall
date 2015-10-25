<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Error Test - the number of errors on similar questions before downgrading
    | user.
    |--------------------------------------------------------------------------
    |
    */

    'error_test' => env('ERROR_TEST', 3),

    /*
    |--------------------------------------------------------------------------
    | Success Test - the number of errors on similar questions to upgrade user
    |--------------------------------------------------------------------------
    |
    */

    'success_test' => env('SUCCESS_TEST', 3),
    /*
    |--------------------------------------------------------------------------
    | Question per test - the number of questions in a test
    |--------------------------------------------------------------------------
    |
    */

    'question_per_test' => env('QUESTION_PER_TEST', 3)
];