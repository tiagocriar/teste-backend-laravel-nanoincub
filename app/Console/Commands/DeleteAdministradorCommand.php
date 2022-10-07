<?php

namespace App\Console\Commands;

use App\Models\Administrador;
use Illuminate\Console\Command;

class DeleteAdministradorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'administrador:excluir';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Exclui administrador';

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
        $login = $this->ask('Qual é o login do administrador que deseja deletar?');

        $administrador = Administrador::where('login', $login)->first();

        if ($this->confirm('Tem certeza que deseja deletar?')) {
            $administrador->delete();
            $this->info('Administrador deletado com sucesso!');
        }

        return 0;
    }
}
