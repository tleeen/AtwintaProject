<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ConfirmsPasswords;

class ConfirmPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Confirm Password Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password confirmations and
    | uses the trait ConfirmPasswords to validate the passwords and show
    | the confirm password form.
    |
    */

    use ConfirmsPasswords;

    /**
     * Where to redirect users after confirmation.
     *
     * @var string
     */
    protected $redirectTo = '/pastes';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
}
