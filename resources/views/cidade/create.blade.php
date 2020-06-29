@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white bg-dark">Cadastro</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('cadastrar_cidade') }}">
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
                                <label for="uf" class="col-form-label">{{ __('* Estado') }}</label>

                                <select id="uf" type="text" class="form-control @error('uf') is-invalid @enderror" name="uf" autocomplete="uf" required>
                                    <option value="AC" @if ( old('uf', $model->uf ?? '')=="AC" ) {{ 'selected' }} @endif>Acre</option>
                                    <option value="AL" @if ( old('uf', $model->uf ?? '')=="AL" ) {{ 'selected' }} @endif>Alagoas</option>
                                    <option value="AP" @if ( old('uf', $model->uf ?? '')=="AP" ) {{ 'selected' }} @endif>Amapá</option>
                                    <option value="AM" @if ( old('uf', $model->uf ?? '')=="AM" ) {{ 'selected' }} @endif>Amazonas</option>
                                    <option value="BA" @if ( old('uf', $model->uf ?? '')=="BA" ) {{ 'selected' }} @endif>Bahia</option>
                                    <option value="CE" @if ( old('uf', $model->uf ?? '')=="CE" ) {{ 'selected' }} @endif>Ceará</option>
                                    <option value="DF" @if ( old('uf', $model->uf ?? '')=="DF" ) {{ 'selected' }} @endif>Distrito Federal</option>
                                    <option value="ES" @if ( old('uf', $model->uf ?? '')=="ES" ) {{ 'selected' }} @endif>Espírito Santo</option>
                                    <option value="GO" @if ( old('uf', $model->uf ?? '')=="GO" ) {{ 'selected' }} @endif>Goiás</option>
                                    <option value="MA" @if ( old('uf', $model->uf ?? '')=="MA" ) {{ 'selected' }} @endif>Maranhão</option>
                                    <option value="MT" @if ( old('uf', $model->uf ?? '')=="MT" ) {{ 'selected' }} @endif>Mato Grosso</option>
                                    <option value="MS" @if ( old('uf', $model->uf ?? '')=="MS" ) {{ 'selected' }} @endif>Mato Grosso do Sul</option>
                                    <option value="MG" @if ( old('uf', $model->uf ?? '')=="MG" ) {{ 'selected' }} @endif>Minas Gerais</option>
                                    <option value="PA" @if ( old('uf', $model->uf ?? '')=="PA" ) {{ 'selected' }} @endif>Pará</option>
                                    <option value="PB" @if ( old('uf', $model->uf ?? '')=="PB" ) {{ 'selected' }} @endif>Paraíba</option>
                                    <option value="PR" @if ( old('uf', $model->uf ?? '')=="PR" ) {{ 'selected' }} @endif>Paraná</option>
                                    <option value="PE" @if ( old('uf', $model->uf ?? '')=="PE" ) {{ 'selected' }} @endif>Pernambuco</option>
                                    <option value="PI" @if ( old('uf', $model->uf ?? '')=="PI" ) {{ 'selected' }} @endif>Piauí</option>
                                    <option value="RJ" @if ( old('uf', $model->uf ?? '')=="RJ" ) {{ 'selected' }} @endif>Rio de Janeiro</option>
                                    <option value="RN" @if ( old('uf', $model->uf ?? 'RN' )=="RN" ) {{ 'selected' }} @endif>Rio Grande do Norte</option>
                                    <option value="RS" @if ( old('uf', $model->uf ?? '')=="RS" ) {{ 'selected' }} @endif>Rio Grande do Sul</option>
                                    <option value="RO" @if ( old('uf', $model->uf ?? '')=="RO" ) {{ 'selected' }} @endif>Rondônia</option>
                                    <option value="RR" @if ( old('uf', $model->uf ?? '')=="RR" ) {{ 'selected' }} @endif>Roraima</option>
                                    <option value="SC" @if ( old('uf', $model->uf ?? '')=="SC" ) {{ 'selected' }} @endif>Santa Catarina</option>
                                    <option value="SP" @if ( old('uf', $model->uf ?? '')=="SP" ) {{ 'selected' }} @endif>São Paulo</option>
                                    <option value="SE" @if ( old('uf', $model->uf ?? '')=="SE" ) {{ 'selected' }} @endif>Sergipe</option>
                                    <option value="TO" @if ( old('uf', $model->uf ?? '')=="TO" ) {{ 'selected' }} @endif>Tocantins</option>
                                    <option value="EX" @if ( old('uf', $model->uf ?? '')=="EX" ) {{ 'selected' }} @endif>Estrangeiro</option>
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