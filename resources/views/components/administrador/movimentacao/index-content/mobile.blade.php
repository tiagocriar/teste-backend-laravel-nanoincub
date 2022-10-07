<div class="flex-auto p-4 pt-6 lg:hidden">
    <ul class="flex flex-col pl-0 mb-0 rounded-lg">
        @forelse ($movimentacoes as $movimentacao)
            <li class="relative flex flex-col p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50 dark:bg-slate-900">
                <div class="flex flex-col w-full">
                    <span class="mb-2 text-xs leading-tight dark:text-white/80">ID:
                        <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{ $movimentacao->id }}</span>
                    </span>
                    <h6 class="mb-2 text-sm leading-normal dark:text-white">{{ $movimentacao->funcionario->nome_completo }}</h6>
                    <div class="mb-2">
                        @if($movimentacao->tipo_movimentacao === 'entrada')
                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80 bg-green-700 text-center rounded-md p-1 mx-auto">ENTRADA</p>
                        @elseif($movimentacao->tipo_movimentacao === 'saida')
                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80 bg-red-700 text-center rounded-md p-1 mx-auto">SAÍDA</p>
                        @endif
                    </div>
                    <span class="text-xs leading-tight dark:text-white/80">Valor:
                        <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{ number_format($movimentacao->valor, 2, ',', '.') }}</span>
                    </span>
                    <span class="text-xs leading-tight dark:text-white/80">Observação:
                        <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{ $movimentacao->observacao }}</span>
                    </span>
                    <span class="text-xs leading-tight dark:text-white/80">Data criação:
                        <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{ date('d/m/Y', strtotime($movimentacao->data_criacao)) }}</span>
                    </span>
                </div>
                <div class="ml-auto text-right w-full">
                    @include('administrador-movimentacao::index-content.options-dropdown', ['movimentacao' => $movimentacao])
                </div>
            </li>
        @empty
            <li class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50 dark:bg-slate-900">
                Nenhum funcionário encontrado.
            </li>
        @endforelse
    </ul>
</div>
