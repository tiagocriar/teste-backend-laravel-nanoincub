<?php

namespace App\Http\Controllers\Movimentacao;

use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use App\Models\Movimentacao;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class MovimentacaoController extends Controller
{

    function __construct()
    {
        $this->breadcrumbs = $this->breadcrumb_init('Movimentações', route('administrador.movimentacao.index'));
    }

    public function index(Request $request){
        $movimentacoes = $this->filter($request->all());

        return view('administrador-movimentacao::index')->with([
            'title' => 'Movimentações',
            'breadcrumbs' => $this->breadcrumbs,
            'movimentacoes' => $movimentacoes,
            'filter_data' => $request->all()
        ]);
    }

    public function create(){
        return view('administrador-movimentacao::form')->with([
            'title' => 'Nova movimentação',
            'breadcrumbs' => $this->breadcrumb_add('Nova movimentação', request()->url())
        ]);
    }

    public function store(Request $request){

        $validator = $this->validateForm($request->all());

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();

            $store = new Movimentacao();
            $store->tipo_movimentacao = $request->tipo_movimentacao;
            $store->valor = floatval(str_replace(',', '.', $request->valor));
            $store->observacao = $request->observacao;
            $store->funcionario_id = $request->funcionario_id;
            $store->administrador_id = Auth::guard('administrador')->user()->id;
            $store->data_criacao = Carbon::now();
            $store->save();

            DB::commit();

            return redirect()->route('administrador.movimentacao.index')->with([
                'success' => 'Funcionário deletado com sucesso!'
            ]);
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();

            return redirect()->back()->withErrors([
                'store' => 'Não foi possível deletar funcionário. Tente novamente.'
            ])->withInput();
        }
    }

    function filter(Array $filter){

        $movimentacoes = Movimentacao::join('funcionario', 'funcionario.id', 'movimentacao.funcionario_id')
        ->when(isset($filter['q_nome_funcionario']), function($q) use($filter){
            $q->where('funcionario.nome_completo', 'like', "%{$filter['q_nome_funcionario']}%");
        })
        ->when(isset($filter['tipo_movimentacao']), function($q) use($filter){
            $q->where('movimentacao.tipo_movimentacao', $filter['tipo_movimentacao']);
        })
        ->when(isset($filter['start']), function($q) use($filter){
            $start = Carbon::createFromFormat('d/m/Y', $filter['start'])->startOfDay();
            $q->where('movimentacao.data_criacao', '>=', $start);
        })
        ->when(isset($filter['end']), function($q) use($filter){
            $end = Carbon::createFromFormat('d/m/Y', $filter['end'])->endOfDay();
            $q->where('movimentacao.data_criacao', '<=', $end);
        })
        ->select(
            'movimentacao.*'
        )
        ->orderBy('id', 'DESC')
        ->paginate(20);

        return $movimentacoes;
    }

    public function getFuncionarios(Request $request){

        if(!isset($request->q_nome)){
            return response()->json([
                'success' => false,
                'error' => 'Atributo q_nome não existe.'
            ], 400);
        }

        try {
            $funcionarios = Funcionario::select('id', 'nome_completo', 'saldo_atual')
            ->where('nome_completo', 'like', "%{$request->q_nome}%")
            ->limit(10)
            ->get();

            $html = view('administrador-movimentacao::form-content.list-funcionarios', compact('funcionarios'))->render();

            return response()->json([
                'success' => true,
                'funcionarios' => $funcionarios,
                'html' => $html
            ]);
        } catch (Exception $e) {
            Log::error($e);

            return response()->json([
                'success' => false,
                'Não foi possível processar requisição.'
            ], 400);
        }
    }

    function validateForm(Array $fields){

        $rules = [
            'funcionario_id' => 'required|numeric',
            'tipo_movimentacao' => 'required',
            'valor' => 'required',
            'observacao' => 'required'
        ];

        $messages = [
            'required' => 'Campo :attribute é obrigatório.',
            'unique' => 'Usuário :input já está cadastrado, por favor, utilize outro.',
            'min' => 'Campo :attribute precisa ser maior que :min.',
            'gte' => 'Campo :attribute precisa ser igual ou maior que :gte.'
        ];

        $validator = Validator::make($fields, $rules, $messages);

        return $validator;
    }
}
