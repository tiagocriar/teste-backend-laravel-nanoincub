<form id="form-search-funcionario" action="{{ route('administrador.funcionario.index') }}">

    <div class="flex flex-wrap mt-4">
        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
            <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
                <span class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                <i class="fas fa-search" aria-hidden="true"></i>
                </span>
                <input type="text" name="q_nome" required value="{{ $filter_data['q_nome'] ?? null }}" class="pl-9 focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                    placeholder="Nome"
                />
            </div>
        </div>

        <div id="date-range" class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0 flex flex-row gap-4 mt-4 md:mt-0">

            @inject('carbon', 'Carbon\Carbon')

            <div class="shrink-0 flex-1">
                <data type="hidden" id="filter_data_start" value="{{ $filter_data['start'] ?? null }}" />
                <input type="text" name="start" placeholder="Início do período" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
            </div>
            <div class="shrink-0 flex-1">
                <data type="hidden" id="filter_data_end" value="{{ $filter_data['end'] ?? null }}" />
                <input type="text" name="end" placeholder="Fim do período" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
            </div>
        </div>

        <div class="px-3 mt-4 ml-auto">
            @if (!empty($filter_data))
                <a href="{{ route('administrador.funcionario.index') }}" class="inline-block px-8 py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-gradient-to-tl from-red-600 to-red-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                    Limpar
                </a>
            @endif
            <button type="submit" class="inline-block px-8 py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-gradient-to-tl from-red-600 to-red-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                Filtrar <i class="fas fa-filter"></i>
            </button>
        </div>
    </div>
</form>

@push('scripts')
    <script src="{{ asset('js/libs/data-picker/locales/pt-BR.js') }}"></script>
    <script>
        const elem = document.getElementById('date-range');
        const rangepicker = new DateRangePicker(elem, {
            language: 'pt-BR'
        });

        const filter_data_start = document.getElementById('filter_data_start').value;
        const filter_data_end = document.getElementById('filter_data_end').value;
        rangepicker.setDates(filter_data_start, filter_data_end);
    </script>
@endpush
