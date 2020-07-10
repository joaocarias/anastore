@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header  text-white bg-dark">Formas de Pagamento</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col col-12">
                            <a href="{{ route('nova_forma_pagamento') }}" class="btn btn-dark btn-sm mb-3">
                                <i class="far fa-file"></i> Novo Cadastro
                            </a>
                        </div>
                    </div>

                    @if( isset($formaPagamentos) && count($formaPagamentos) > 0 )

                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Forma de Pagamento</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($formaPagamentos as $item)
                            <tr>
                                <th scope="row">{{ __($item->id) }}</th>
                                <td>{{ __($item->nome)  }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @else

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Atenção: </strong> Não encontrou registro!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection