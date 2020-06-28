@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header  text-white bg-dark mb-3">Usuários</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if( isset($usuarios) && count($usuarios) > 0 )

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">E-Mail</th>
                                <th scope="col">Data de Criação</th>
                                <th scope="col">Data Updade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                            <tr>
                                <th scope="row">{{ __($usuario->id) }}</th>
                                <td>{{ __($usuario->name)  }}</td>
                                <td>{{ __($usuario->email)  }}</td>
                                <td>{{ __($usuario->created_at->format('d/m/Y H:i:s'))  }}</td>
                                <td>{{ __($usuario->updated_at->format('d/m/Y H:i:s'))  }}</td>
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