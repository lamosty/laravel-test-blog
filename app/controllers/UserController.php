<?php

class UserController extends BaseController {

    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function getCreate() {
        $params = array(
            'from' => URL::previous()
        );

        return View::make('user/create', $params);
    }

    public function getLogin() {
        $user = Auth::user();
        if (!empty($user->id)) {
            return Redirect::route('blog.home');
        }

        $params = array(
            'from' => URL::previous()
        );

        if (Input::has('from')) {
            $params["from"] = Input::get('from');
        }

        return View::make('user/login', $params);
    }

    public function getLogout() {
        Auth::logout();

        return Redirect::to(URL::previous());
    }

    public function postLogin() {
        $username = Input::get('username');
        $password = Input::get('password');

        if (Auth::attempt(array(
            "username" => $username,
            "password" => $password))
        ) {
            if (Input::has('from')) {
                return Redirect::to(Input::get('from'));
            }

            return Redirect::to('/');
        }
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
            return Redirect::route('user.login', array('from' => Input::get('from')))
                ->with('success', 'Your account has been created. You can login now.');
        }
    }

}
