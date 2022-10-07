<?php

namespace App\Console\Commands;

use App\Models\Administrador;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class ChangePasswordAdministradorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'administrador:mudar-senha';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Muda senha do administrador';

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

        $login = $this->ask('Qual é o login do administrador que deseja mudar a senha?');
        $administrador = Administrador::where('login', $login)->first();

        if(!isset($administrador->id)){
            $this->info('Administrador não encontrado, tente novamente.');
            return $this->handle();
        }

        $senha = $this->secret('Qual é a nova senha?');

        if ($this->confirm('Tem certeza que deseja mudar a senha?')) {
            $administrador->senha = Hash::make($senha);
            $administrador->save();
            $this->info('Senha alterada com sucesso!');
        }

        return 0;
    }
}
