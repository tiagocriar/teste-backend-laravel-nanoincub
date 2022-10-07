<ul class="flex flex-col pl-0 mb-0">
    <li class="mt-0.5 w-full">
        <a class="py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors"
            href="{{ route('administrador.funcionario.index') }}">
            <div
                class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-red-500 fas fa-user-friends"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Funcionários</span>
        </a>
    </li>

    <li class="mt-0.5 w-full">
        <a class="py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors"
            href="{{ route('administrador.movimentacao.index') }}">
            <div
                class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-red-500 fas fas fa-exchange-alt"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Movimentações</span>
        </a>
    </li>
</ul>
