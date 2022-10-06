@extends('layout-admin::master')
@section('main-content')

<form method="POST" action="{{ route('administrador.funcionario.store') }}">
    @csrf
    <div class="w-full max-w-full shrink-0 md:w-8/12 md:flex-0">

        @error('store')
            <div class="relative w-full p-4 text-white bg-red-600 rounded-lg">{{ $message }}</div>
        @enderror

        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-6">
                <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Informações de acesso</p>
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                        <div class="mb-4">
                            <label for="login"
                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Usuário:</label>
                            <input type="text" name="login" placeholder="Usuário"
                                required pattern=".{4,}" title="Mínimo de 4 caracteres"
                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            >
                            @error('login')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                        <div class="mb-4">
                            <label for="senha" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                Senha:
                            </label>
                            <div class="flex justify-end items-center relative">
                                <input type="password" name="senha" placeholder="Senha"
                                    required pattern=".{8,}" title="Mínimo de 8 caracteres"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                >
                                <i onclick="changePasswordType(this)" class="absolute mr-2 w-10 cursor-pointer far fa-eye"></i>
                            </div>
                            @error('senha')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent ">

                <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Informações gerais</p>

                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                        <div class="mb-4">
                            <label for="nome_completo" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                Nome Completo:
                            </label>
                            <input type="text" name="nome_completo" placeholder="Nome Completo"
                                required
                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            >
                            @error('nome_completo')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />

                <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Bonificação</p>

                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                        <div class="mb-4">
                            <label for="saldo_inicial" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                Saldo inicial
                            </label>
                            <input type="number" name="saldo_inicial"
                                required step="1" min="0"
                                value="0"
                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            >
                            @error('saldo_inicial')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap">
                    <button type="submit" class="inline-block px-8 py-2 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
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
        function changePasswordType(e){
            const input_password = document.querySelector('input[name=senha]');

            if(input_password.type === 'password'){
                input_password.type = 'text';

                e.classList.remove('fa-eye');
                e.classList.add('fa-eye-slash');
            }else{
                input_password.type = 'password';

                e.classList.remove('fa-eye-slash');
                e.classList.add('fa-eye');
            }
        }
    </script>
@endpush
