@extends('layout-admin::master')
@section('main-content')

<form id="form-movimentacao" method="POST" action="{{ route('administrador.movimentacao.store') }}">
    @csrf

    <input type="hidden" id="funcionario_id" name="funcionario_id" value="">
    <div class="w-full max-w-full shrink-0 md:w-8/12 md:flex-0">

        @error('store')
            <div class="relative w-full p-4 text-white bg-red-600 rounded-lg mb-5">{{ $message }}</div>
        @enderror

        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-6">

                <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Escolha o funcionário</p>

                <div class="flex flex-row">
                    <div class="flex -mx-3 md:w-9/12 md:flex-0">
                        <div class="w-full max-w-full px-3 shrink-0">
                            <input type="text" id="q_nome" placeholder="Pesquise por nome..."
                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            >
                        </div>
                    </div>

                    <div class="flex md:w-3/12 ml-5">
                        <button type="button" onclick="searchFuncionarios(this)"
                            data-url="{{ route('administrador.movimentacao.getFuncionarios') }}"
                            class="h-[40px] w-full inline-block py-2 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-gradient-to-tl from-red-600 to-red-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85"
                        >
                            Pesquisar
                        </button>
                    </div>
                </div>

                <div id="content-list-funcionarios"></div>

                <div id="selected-funcionario" class="hidden mt-4">
                    <li class="relative flex p-3 border-0 rounded-xl bg-gray-50 dark:bg-slate-900">
                        <h6 class="text-sm leading-normal dark:text-white my-auto">
                            <span id="nome_funcionario_selected"></span> <i class="fas fa-check-circle"></i>
                        </h6>
                    </li>
                </div>

                <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent ">

                <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Movimentação</p>

                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                        <div class="mb-4">
                            <label for="tipo_movimentacao"
                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Tipo:</label>
                            <select type="text" name="tipo_movimentacao"
                                required
                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            >
                                <option value="entrada">Entrada</option>
                                <option value="saida">Saída</option>
                            </select>
                            @error('tipo_movimentacao')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                        <div class="mb-4">
                            <label for="valor" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                Valor:
                            </label>
                            <input type="text" id="valor" name="valor"
                                required
                                placeholder="Valor"
                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            >
                            @error('valor')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                        <div class="mb-4">
                            <label for="observacao" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                Observação:
                            </label>
                            <input type="text" name="observacao" placeholder="Observação"
                                required
                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            >
                            @error('observacao')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap">
                    <button type="submit" class="inline-block px-8 py-2 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-gradient-to-tl from-red-600 to-red-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                        Salvar
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@push('scripts')
    <script>
        window.addEventListener('keydown',function(e){if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13){if(e.target.nodeName=='INPUT'&&e.target.type=='text'){e.preventDefault();return false;}}},true);

        const currency = IMask(document.getElementById('valor'), {
            mask: Number,
            scale: 2,
            signed: false,
            thousandsSeparator: '',
            radix: ','
        });

        document.getElementById('form-movimentacao').addEventListener('submit', function(event){
            event.preventDefault();

            const funcionario_id = document.getElementById('funcionario_id').value;
            if(funcionario_id === undefined || funcionario_id === null || funcionario_id === ''){
                alert('Selecione um funcionário para continuar.')
            }else{
                this.submit();
            }
        });

        async function searchFuncionarios(e){
            const q_nome = document.getElementById('q_nome').value;
            const url = e.dataset.url;

            const responseFuncionarios = await sendSearchFuncionarios(url, q_nome);

            if(responseFuncionarios.data.success){

                document.getElementById('content-list-funcionarios').classList.remove('hidden');
                const selected_funcionario = document.getElementById('selected-funcionario');

                if(!selected_funcionario.classList.contains('hidden')){
                    selected_funcionario.classList.add('hidden');
                }

                document.getElementById('content-list-funcionarios').innerHTML = responseFuncionarios.data.html;
            }
        }

        function sendSearchFuncionarios(url, q_nome){
            return axios({
                url: url,
                method: 'POST',
                data: {
                    q_nome: q_nome
                }
            });
        }

        function selectFuncionario(e){
            const id = e.dataset.id;
            const nome_completo = e.dataset.nome_completo;
            console.log(nome_completo);

            document.getElementById('funcionario_id').value = id;
            document.getElementById('nome_funcionario_selected').innerHTML = nome_completo;

            document.getElementById('selected-funcionario').classList.remove('hidden');
            document.getElementById('content-list-funcionarios').classList.add('hidden');
            document.getElementById('q_nome').value = null;
        }
    </script>
@endpush
