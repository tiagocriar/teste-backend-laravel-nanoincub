<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FuncionarioController extends Controller
{

    function __construct()
    {
        $this->breadcrumbs = $this->breadcrumb_init('Funcionários', route('administrador.funcionario.index'));
    }

    public function index(){
        $funcionarios = Funcionario::orderBy('id', 'DESC')->get();

        return view('administrador-funcionario::index')->with([
            'title' => 'Funcionários',
            'breadcrumbs' => $this->breadcrumbs,
            'funcionarios' => $funcionarios
        ]);
    }

    public function create(){
        return view('administrador-funcionario::form')->with([
            'title' => 'Novo Funcionário',
            'breadcrumbs' => $this->breadcrumb_add('Novo Funcionário', request()->url())
        ]);
    }

    public function store(Request $request){
        $validator = $this->validateForm($request->all());

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();

            $store = new Funcionario();
            $store->nome_completo = $request->nome_completo;
            $store->login = $request->login;
            $store->senha = Hash::make($request->senha);
            $store->saldo_atual = floatval($request->saldo_inicial);
            $store->administrador_id = auth()->guard('administrador')->user()->id;
            $store->save();

            DB::commit();

            return redirect()->route('administrador.funcionario.index')->with([
                'success' => 'Funcionário cadastrado com sucesso!'
            ]);
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();

            return redirect()->back()->withErrors([
                'store' => 'Não foi possível salvar funcionário. Tente novamente.'
            ])->withInput();
        }
    }

    function validateForm(Array $fields){

        $validator = Validator::make($fields,  [
            'login' => 'required|unique:funcionario|min:4',
            'senha' => 'required|min:8',
            'nome_completo' => 'required',
            'saldo_inicial' => 'required|integer|gte:0'
        ],
        [
            'required' => 'Campo :attribute é obrigatório.',
            'unique' => 'Usuário :input já está cadastrado, por favor, utilize outro.',
            'min' => 'Campo :attribute precisa ser maior que :min.',
            'integer' => 'Campo :attribute precisa ser um número inteiro.',
            'gte' => 'Campo :attribute precisa ser igual ou maior que :gte.'
        ]);

        return $validator;
    }
}
