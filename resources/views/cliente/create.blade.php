@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white bg-dark">Cliente -> Cadastro</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('cadastrar_cliente') }}">
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

                            <div class="col-md-6">
                                <label for="email" class="col-form-label text-md-right">{{ __('E-Mail') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $model->email ?? '') }}" autocomplete="email" maxlength="254">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="telefone" class="col-form-label text-md-right">{{ __('Telefone') }}</label>
                                <input id="telefone" type="telefone" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ old('telefone', $model->telefone ?? '') }}" autocomplete="telefone" maxlength="19">

                                @error('telefone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="cidade_id" class="col-form-label">{{ __('* Cidade') }}</label>

                                <select id="cidade_id" type="text" class="form-control @error('cidade_id') is-invalid @enderror" name="cidade_id" autocomplete="cidade_id" required>
                                    <option selected disabled>-- Selecione --</option>

                                    @foreach($cidades as $item)
                                    <option value="{{ __($item->id) }}" @if ( old('cidade_id', $model->cidade_id ?? '' ) == $item->id ) {{ 'selected' }} @endif>{{ __($item->nome . " - " .$item->uf) }}</option>
                                    @endforeach
                                </select>
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

@section('javascript')
<script type="text/javascript">
    $(document).ready(function($) {
        var SPMaskBehavior = function(val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
                onKeyPress: function(val, e, field, options) {
                    field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };

        $('#telefone').mask(SPMaskBehavior, spOptions);
    });
</script>
@endsection