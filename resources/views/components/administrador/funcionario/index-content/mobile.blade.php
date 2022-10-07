<div class="flex-auto p-4 pt-6 lg:hidden">
    <ul class="flex flex-col pl-0 mb-0 rounded-lg">
        @forelse ($funcionarios as $funcionario)
            <li class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50 dark:bg-slate-900">
                <div class="flex flex-col">
                    <h6 class="mb-4 text-sm leading-normal dark:text-white">{{ $funcionario->nome_completo }}</h6>
                    <span class="mb-2 text-xs leading-tight dark:text-white/80">ID:
                        <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{ $funcionario->id }}</span>
                    </span>
                    <span class="mb-2 text-xs leading-tight dark:text-white/80">Saldo:
                        <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{ number_format($funcionario->saldo_atual, 2, ',', '.') }}</span>
                    </span>
                    <span class="text-xs leading-tight dark:text-white/80">Data criação:
                        <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{ date('d/m/Y', strtotime($funcionario->data_criacao)) }}</span>
                    </span>
                </div>
                <div class="ml-auto text-right">
                    @include('administrador-funcionario::index-content.options-dropdown', ['funcionario' => $funcionario])
                </div>
            </li>
        @empty
            <li class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50 dark:bg-slate-900">
                Nenhum funcionário encontrado.
            </li>
        @endforelse
    </ul>
</div>
