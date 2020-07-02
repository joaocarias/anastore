@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white bg-dark">Produto -> Cadastro</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('cadastrar_produto') }}">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <label for="nome" class="col-form-label text-md-right">{{ __('* Nome') }}</label>
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome', $model->nome ?? '') }}" autocomplete="nome" required maxlength="254">

                                @error('nome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="categoria_produto_id" class="col-form-label">{{ __('* Categoria') }}</label>

                                <select id="categoria_produto_id" type="text" class="form-control @error('categoria_produto_id') is-invalid @enderror" name="categoria_produto_id" autocomplete="categoria_produto_id" required>
                                    <option selected disabled>-- Selecione --</option>

                                    @foreach($categoriaProdutos as $item)
                                    <option value="{{ __($item->id) }}" @if ( old('categoria_produto_id', $model->categoria_produto_id ?? '' ) == $item->id ) {{ 'selected' }} @endif>{{ __($item->nome) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="cor_id" class="col-form-label">{{ __('* Cor') }}</label>

                                <select id="cor_id" type="text" class="form-control @error('cor_id') is-invalid @enderror" name="cor_id" autocomplete="cor_id" required>
                                    <option selected disabled>-- Selecione --</option>

                                    @foreach($cores as $item)
                                    <option value="{{ __($item->id) }}" @if ( old('cor_id', $model->cor_id ?? '' ) == $item->id ) {{ 'selected' }} @endif>{{ __($item->nome) }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-3">
                                <label for="tamanho_produto_id" class="col-form-label">{{ __('* Tamanho') }}</label>

                                <select id="tamanho_produto_id" type="text" class="form-control @error('tamanho_produto_id') is-invalid @enderror" name="tamanho_produto_id" autocomplete="tamanho_produto_id" required>
                                    <option selected disabled>-- Selecione --</option>

                                    @foreach($tamanhoProdutos as $item)
                                    <option value="{{ __($item->id) }}" @if ( old('tamanho_produto_id', $model->tamanho_produto_id ?? '' ) == $item->id ) {{ 'selected' }} @endif>{{ __($item->nome) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="preco" class="col-form-label text-md-right">{{ __('* Preço (R$)') }}</label>
                                <input id="preco" type="text" class="form-control @error('preco') is-invalid @enderror mask_moeda_real" name="preco" value="{{ old('preco', $model->preco ?? '') }}" autocomplete="preco" required maxlength="10">

                                @error('preco')
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

                                <a href="{{ route('produtos') }}" class="btn btn-danger">
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

@section('javascript')
<script type="text/javascript">
    $(document).ready(function($) {
        $('.mask_moeda_real').mask("#.##0,00", {
            reverse: true
        });
    });
</script>
@endsection