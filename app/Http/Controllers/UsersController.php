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
        $this->middleware('CustomAuth');
        $this->user = $user;
    }

    public function dashboard() {
        return view('admin.dashboard');
    }
}
