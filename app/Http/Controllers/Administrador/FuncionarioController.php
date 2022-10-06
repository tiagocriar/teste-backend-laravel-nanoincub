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
use Illuminate\Validation\ValidationException;

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

    public function update(Request $request){
        $funcionario = Funcionario::findOrFail(decrypt($request->key));

        return view('administrador-funcionario::form')->with([
            'title' => 'Editar Funcionário',
            'breadcrumbs' => $this->breadcrumb_add('Editar Funcionário', request()->url()),
            'funcionario' => $funcionario,
            'action' => 'update'
        ]);
    }

    public function store(Request $request){
        $action = ($request->id_funcionario != null && decrypt($request->key) === decrypt($request->id_funcionario)) ? 'update' : 'create';

        $validator = $this->validateForm($request->all(), $action);

        if($this->validateUniqueLogin($request, $action)){
            return redirect()->back()->withErrors([
                'login' => 'Usuário já está cadastrado, por favor, utilize outro.'
            ])->withInput();
        }

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();
            $this->saveData($request, $action);
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

    function saveData(Request $request, String $action = 'create'){

        switch ($action) {
            case 'create':
                $store = new Funcionario();
                $store->nome_completo = $request->nome_completo;
                $store->login = $request->login;
                $store->senha = Hash::make($request->senha);
                $store->saldo_atual = floatval($request->saldo_inicial);
                $store->administrador_id = auth()->guard('administrador')->user()->id;
                $store->save();
                break;

            case 'update':
                $funcionario = Funcionario::findOrFail(decrypt($request->key));
                $funcionario->nome_completo = $request->nome_completo;
                $funcionario->login = $request->login;
                if(!is_null($request->senha)) $funcionario->senha = Hash::make($request->senha);
                $funcionario->administrador_id = auth()->guard('administrador')->user()->id;
                $funcionario->save();
                break;
        }
    }

    function validateForm(Array $fields, String $action = 'create'){

        switch ($action) {
            case 'create':
                $rules = [
                    'login' => 'required|unique:funcionario|min:4',
                    'senha' => 'required|min:8',
                    'nome_completo' => 'required',
                    'saldo_inicial' => 'required|integer|gte:0'
                ];
                break;

            case 'update':
                $rules = [
                    'login' => 'required|min:4',
                    'senha' => 'nullable|min:8',
                    'nome_completo' => 'required'
                ];
                break;
        }

        $messages = [
            'required' => 'Campo :attribute é obrigatório.',
            'unique' => 'Usuário :input já está cadastrado, por favor, utilize outro.',
            'min' => 'Campo :attribute precisa ser maior que :min.',
            'integer' => 'Campo :attribute precisa ser um número inteiro.',
            'gte' => 'Campo :attribute precisa ser igual ou maior que :gte.'
        ];

        $validator = Validator::make($fields, $rules, $messages);

        return $validator;
    }

    function validateUniqueLogin(Request $request, String $action){

        if($action === 'update'){
            $funcionario = Funcionario::findOrFail(decrypt($request->key));

            if(Funcionario::where('login', $request->login)->whereNotIn('id', [$funcionario->id])->count() > 0){
                return true;
            }
        }

        return false;
    }
}
