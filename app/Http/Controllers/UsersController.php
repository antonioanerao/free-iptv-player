<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * @property User user
 */
class UsersController extends Controller
{
    public function __construct(User $user) {
        $this->middleware('auth');
        $this->user = $user;
    }

    public function index() {
        $users = $this->user->all();
        return view('admin.users.index', compact('users'));
    }

    public function edit($id) {
        $user = $this->user->find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update($id) {

        request()->validate([
            'name'=>'required',
            'email'=>'required',
            'iptv_login'=>'required',
            'iptv_password'=>'required'
        ]);

        $data = request()->all();
        $user = $this->user->find($id);
        $user->update($data);
        return back()->with('message', 'Account updated');
    }

    public function updatePassword($id) {
        request()->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        try{
            \DB::table('users')
                ->where('id', $id)
                ->update(['password'=>bcrypt(request()->input('password'))]);
        }catch(\Exception $exception) {
            return $exception->getMessage();
        }

        return back()->with('message', 'Password updated');
    }

    public function create() {
        return view('admin.users.create');
    }

    public function store(UsersRequest $request) {
        $data = $request->all();
        $data['iptv_login'] = $request->get('iptv_login');
        $data['iptv_password'] = $request->get('iptv_password');

        try{
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'iptv_login' => $data['iptv_login'],
                'iptv_password' => $data['iptv_password'],
                'password' => Hash::make($data['password']),
            ]);
        }catch (\Exception $exception) {
            return $exception->getMessage();
        }

        return back()->with('message', 'New user created succefuly');
    }
}
