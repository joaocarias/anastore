@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header  text-white bg-dark">Clientes</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col col-12">
                            <a href="{{ route('novo_cliente') }}" class="btn btn-dark btn-sm mb-3">
                                <i class="far fa-file"></i> Novo Cadastro
                            </a>
                        </div>
                    </div>

                    @if( isset($clientes) && count($clientes) > 0 )

                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">E-Mail</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Cidade</th>
                                <th scope="col">Data de Criação</th>
                                <th scope="col">Data Updade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $item)
                            <tr>
                                <th scope="row">{{ __($item->id) }}</th>
                                <td>{{ __($item->nome)  }}</td>
                                <td>{{ __($item->email) }}
                                <td>{{ __($item->telefone)  }}</td>
                                <td>{{ __($item->cidade->nome . " - " . $item->cidade->uf)  }}</td>
                                <td>{{ __($item->created_at->format('d/m/Y H:i:s'))  }}</td>
                                <td>{{ __($item->updated_at->format('d/m/Y H:i:s'))  }}</td>
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