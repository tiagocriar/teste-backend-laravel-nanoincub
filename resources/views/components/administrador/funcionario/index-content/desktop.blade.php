<div class="p-3 hidden lg:block">
    <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
        <thead class="align-bottom">
            <tr>
                <th class="px-3 py-3 pl-2 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-200 opacity-70">ID</th>
                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nome</th>
                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Saldo</th>
                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Data criação</th>
                <th class="w-32 px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Menu</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($funcionarios as $funcionario)
                <tr>
                    <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">{{ $funcionario->id }}</p>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">{{ $funcionario->nome_completo }}</p>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">{{ number_format($funcionario->saldo_atual, 2, ',', '.') }}</p>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">{{ date('d/m/Y', strtotime($funcionario->data_criacao)) }}</p>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                        @include('administrador-funcionario::index-content.options-dropdown', ['funcionario' => $funcionario])
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                        Nenhum funcionário encontrado.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
