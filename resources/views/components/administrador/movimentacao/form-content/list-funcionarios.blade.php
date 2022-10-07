<div class="flex-auto pt-6">
    <ul class="flex flex-col pl-0 mb-0 rounded-lg">
        @forelse ($funcionarios as $funcionario)
            <li class="relative flex p-3 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50 dark:bg-slate-900">
                <div class="flex flex-col">
                    <h6 class="mb-4 text-sm leading-normal dark:text-white">{{ $funcionario->nome_completo }}</h6>
                    <span class="mb-2 text-xs leading-tight dark:text-white/80">ID:
                        <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{ $funcionario->id }}</span>
                    </span>
                </div>
                <div class="ml-auto text-right">
                    <button type="button"
                        onclick="selectFuncionario(this)"
                        data-id="{{ $funcionario->id }}"
                        data-nome_completo="{{ $funcionario->nome_completo }}"
                        class="inline-block px-8 py-2 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-gradient-to-tl from-red-600 to-red-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85"
                    >
                        Selecionar
                    </button>
                </div>
            </li>
        @empty
            <li class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50 dark:bg-slate-900">
                Nenhum funcionário encontrado.
            </li>
        @endforelse
    </ul>
</div>
