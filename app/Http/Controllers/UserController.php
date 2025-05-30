<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $user = User::all();

        return $user;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request) {
        $data = $request->all();

        // if($data['email']){
        //     $checkEmail = User::where('email', $data['email'])->count();
        //     if($checkEmail > 0){
        //         throw new Exception('Já existe um usuário com esse e-mail cadastrado!');
        //     }
        // }

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt ($data['password']);
        // $dataFormatada = Carbon::createFromFormat('d/m/Y H:i', $request->get('created_at'))->toDateTimeString();
        $user->save();

        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        $user = User::find($id);

        if(!$user){
            return abort(404, 'Erro! Usuário não encontrado');
        }

        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request) {
        $data = $request->all();

        $user = User::find($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->save();

        return User::find($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id) {
        $user = User::find($id);

        if(!$user){
            return ['msg' => 'Esse usuário não existe no sistema!'];
        }

        $user->delete();

        return ['msg' => 'Usuário removido com sucesso!'];
    }
}
