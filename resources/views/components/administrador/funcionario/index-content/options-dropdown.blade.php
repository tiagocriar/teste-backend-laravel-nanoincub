<div class="relative">
    <button dropdown-trigger aria-expanded="false" type="button" class="inline-block px-3 py-1 text-center text-white align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-red-600 to-red-500 leading-normal text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Opções</button>
    <p class="hidden transform-dropdown-show"></p>
    <ul dropdown-menu class="z-10 text-sm lg:shadow-3xl duration-250 before:duration-350 before:font-awesome before:ease min-w-44 before:text-5.5 transform-dropdown pointer-events-none absolute md:left-auto -left-30 top-[5px] m-0 -mr-4 list-none rounded-lg border-0 border-solid border-transparent bg-white dark:bg-slate-800 bg-clip-padding px-0 py-2 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-7 before:left-auto before:top-0 before:z-40 before:text-white before:transition-all">
      <li>
        <a class="py-1.2 lg:ease clear-both block w-full whitespace-nowrap border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-slate-850 lg:transition-colors lg:duration-300"
            href="{{ route('administrador.funcionario.update', ['key' => encrypt($funcionario->id)]) }}"
        >
            <i class="far fa-edit"></i> Editar
        </a>
      </li>

      <li>
        <a class="py-1.2 lg:ease clear-both block w-full whitespace-nowrap border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-slate-850 lg:transition-colors lg:duration-300"
            href="{{ route('administrador.funcionario.extrato', ['key' => encrypt($funcionario->id)]) }}"
        >
            <i class="fas fa-receipt"></i> Extrato
        </a>
      </li>

      <li>
        <form action="{{ route('administrador.funcionario.delete', ['key' => encrypt($funcionario->id)]) }}" method="POST">
            @csrf
            @method('DELETE')

            <button onclick="return confirm('Tem certeza que deseja deletar?')" class="py-1.2 lg:ease clear-both block w-full whitespace-nowrap border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-slate-850 lg:transition-colors lg:duration-300"
                href="{{ route('administrador.funcionario.update', ['key' => encrypt($funcionario->id)]) }}"
            >
                <i class="fas fa-trash"></i> Deletar
            </button>
        </form>
      </li>
    </ul>
</div>
