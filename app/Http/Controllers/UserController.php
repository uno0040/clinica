<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $users = User::all();
         return view('users.index', compact('users'));
        //return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'name' => 'required',
            'senha' => 'required',
            'cpf' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'telefone' => 'required',
            'dob' => 'required|date',
            'cep' => 'required',
            // se precisar pode colocar mais validacoes
        ]);
        $user = new User;
        $user->username = $request->username; // request('username'); se nao funcionar
        $user->name = $request->name;
        $user->senha = $request->senha;
        $user->cpf = $request->cpf;
        $user->email = $request->email;
        $user->telefone = $request->telefone;
        $user->dob = $request->dob;
        $user->cep = $request->cep;
        $user->logradouro = $request->logradouro;
        $user->complemento = $request->complemento;
        $user->bairro = $request->bairro;
        $user->localidade = $request->localidade;
        $user->uf = $request->uf;
        

        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuário adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // retorna todo os dados do usuário com base no id fornecido
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    // public function show(User $user)
    // {
    //     return $user;
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user = new User;
        $user->username = $request->username; // request('username'); se nao funcionar
        $user->name = $request->name;
        $user->senha = $request->senha;
        $user->cpf = $request->cpf;
        $user->email = $request->email;
        $user->telefone = $request->telefone;
        $user->dob = $request->dob;
        $user->cep = $request->cep;
        $user->logradouro = $request->logradouro;
        $user->complemento = $request->complemento;
        $user->bairro = $request->bairro;
        $user->localidade = $request->localidade;
        $user->uf = $request->uf;
        

        $user->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        // necessita de rotas
        // TODOS NECESSITAM DE ROTAS
        // return redirect('/pagina'); <- exemplo com blades
    }
}
