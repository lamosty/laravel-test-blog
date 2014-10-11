<?php

class UserController extends BaseController {

    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function getCreate() {
        return View::make('user/create');
    }

    public function getLogin() {
        $user = Auth::user();
        if (!empty($user->id)) {
            return Redirect::route('home');
        }

        return View::make('user/login');
    }

    public function postIndex() {
        $validationRules = array(
            'username' => 'required|min:3|unique:users,username',
            'password' => 'required|min:8|confirmed'
        );

        $validator = Validator::make(Input::all(), $validationRules);

        if ($validator->fails()) {
            return Redirect::route('user.create')
                ->withInput(Input::except('password', 'password_confirmation'))
                ->withErrors($validator);
        }

        $this->user->username = Input::get('username');
        $this->user->password = Hash::make(Input::get('password'));

        $this->user->save();

        if ($this->user->id) {
            return Redirect::route('user.login')
                ->with('success', 'Your account has been created. You can login now.');
        }
    }

}
