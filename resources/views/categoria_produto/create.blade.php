@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white bg-dark">Categoria -> Cadastro</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('cadastrar_categoria_produto') }}">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <label for="nome" class="col-form-label text-md-right">{{ __('* Categoria') }}</label>
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome', $model->nome ?? '') }}" autocomplete="nome" required maxlength="254">

                                @error('nome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-12 mt-3 mb-3">
                                <button type="submit" class="btn btn-dark">
                                    <i class="far fa-save"></i>
                                    {{ __('Salvar') }}
                                </button>

                                <a href="{{ route('cidades') }}" class="btn btn-danger">
                                    <i class="far fa-times-circle"></i>
                                    {{ __('Cancelar') }}
                                </a>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection