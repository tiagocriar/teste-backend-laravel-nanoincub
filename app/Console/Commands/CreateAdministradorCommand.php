<?php

namespace App\Console\Commands;

use App\Models\Administrador;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CreateAdministradorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'administrador:criar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria um novo administrador';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $login = $this->ask('Qual é o login? (min 4 caracteres)');
        $check_login = (Administrador::where('login', $login)->count() > 0);

        if($check_login){
            $this->error('Este login já está em uso, tente outro.');
            return $this->handle();
        }

        $senha = $this->secret('Qual é a senha? (min 8 caracteres)');
        $nome_completo = $this->ask('Qual é o nome completo? (min 4 caracteres)');

        $validation['nome_completo'] = (!is_null($nome_completo) && strlen($nome_completo) >= 4);
        $validation['login'] = (!is_null($nome_completo) && strlen($nome_completo) >= 4);
        $validation['senha'] = (!is_null($nome_completo) && strlen($nome_completo) >= 4);

        if(in_array(false, $validation)){
            $this->error('Não foi possível validar os dados informados, tente novamente.');
            return $this->handle();
        }

        try {
            DB::beginTransaction();

            $store = new Administrador();
            $store->login = $login;
            $store->nome_completo = $nome_completo;
            $store->senha = Hash::make($senha);
            $store->save();

            DB::commit();

            $this->info('Administrador ' . $nome_completo . ' cadastrado com sucesso');
            return 0;
        } catch (Exception $e) {
            Log::error($e);
            $this->error('Não foi possível cadastrar, verifique os logs e tente novamente.');
            return 0;
        }
    }
}
