@extends('layout-admin::master')
@section('main-content')

    <div class="relative flex flex-col px-2 h-full min-w-0 mb-6 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="p-6 px-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
            <div class="flex flex-wrap -mx-3">
                <div class="max-w-full px-3 md:w-1/2 md:flex-none">
                    <h6 class="mb-0 dark:text-white">{{ $funcionario->nome_completo }}</h6>
                </div>
                <div class="max-w-full px-3 md:w-1/2">
                    <div class="float-right inline-block">
                        <span class="text-gray-500 text-sm">Saldo atual: </span>
                        <span class="font-bold {{ ($funcionario->saldo_atual > 0) ? 'text-green-600' : 'text-red-500' }}">{{ number_format($funcionario->saldo_atual, 2, ',', '.') }}</span>
                    </div>

                </div>
            </div>
        </div>
        <div class="flex-auto p-4 pt-6">
            <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                @forelse ($movimentacoes as $movimentacao)
                    <li class="relative flex justify-between py-2 pl-0 mb-2 border-0 rounded-t-inherit text-inherit rounded-xl">
                        <div class="flex items-center">
                            @if($movimentacao->tipo_movimentacao === 'entrada')
                                <button class="leading-pro ease-in text-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-emerald-500 border-transparent bg-transparent text-center align-middle font-bold uppercase text-emerald-500 transition-all hover:opacity-75"><i class="fas fa-arrow-up text-3xs" aria-hidden="true"></i></button>
                            @elseif($movimentacao->tipo_movimentacao === 'saida')
                                <button class="leading-pro ease-in text-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-red-600 border-transparent bg-transparent text-center align-middle font-bold uppercase text-red-600 transition-all hover:opacity-75"><i class="fas fa-arrow-down text-3xs" aria-hidden="true"></i></button>
                            @endif
                            <div class="flex flex-col">
                                <h6 class="mb-1 text-sm leading-normal dark:text-white text-slate-700">{{ $movimentacao->observacao }}</h6>
                                <span class="text-xs leading-tight dark:text-white/80">{{ date('d/m/Y', strtotime($movimentacao->data_criacao)) }}</span>
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            @if($movimentacao->tipo_movimentacao === 'entrada')
                                <p class="relative z-10 inline-block m-0 text-sm font-semibold leading-normal text-transparent bg-gradient-to-tl from-green-600 to-lime-400 bg-clip-text">+ {{ number_format($movimentacao->valor, 2, ',', '.') }}</p>
                            @elseif($movimentacao->tipo_movimentacao === 'saida')
                                <p class="relative z-10 inline-block m-0 text-sm font-semibold leading-normal text-transparent bg-gradient-to-tl from-red-600 to-orange-600 bg-clip-text">- {{ number_format($movimentacao->valor, 2, ',', '.') }}</p>
                            @endif
                        </div>
                    </li>
                    <hr class="h-px mx-0 my-2 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent ">
                @empty
                    Não há registros de movimentações para este funcionário.
                @endforelse
            </ul>
        </div>
    </div>

@endsection
