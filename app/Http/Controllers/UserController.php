<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return response()->json($users)->setStatusCode(200, 'Успешно');
    }

    public function create(UserCreateRequest $request) {
        $user = new User($request->all());
        $user->save();

        return response()->json($user)->setStatusCode(200, 'Успешно');
    }

    public function show($id) {
        $user = User::find($id);

        if ($user) {
            return response()->json($user)->setStatusCode(200, 'Успешно');
        } else {
            return response()->json('Пользователь не найден')->setStatusCode(404, 'Не найдено');
        }
    }

    public function update(UserUpdateRequest $request, $id) {
        $user = User::find($id);

        if ($user) {
            $user->update($request->all());
            return response()->json($user)->setStatusCode(200, 'Успешно');
        } else {
            return response()->json('Пользователь не найден')->setStatusCode(404, 'Не найдено');
        }
    }

    public function destroy($id) {
        $user = User::find($id);

        if ($user) {
            User::destroy($id);
            return response()->json('Пользователь удален')->setStatusCode(200, 'Успешно');
        } else {
            return response()->json('Пользователь не найден')->setStatusCode(404, 'Не найдено');
        }
    }
}
