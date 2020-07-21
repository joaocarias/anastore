@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white bg-dark">Entrada de Produto -> Cadastro</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('cadastrar_entrada_estoque_produto') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="produto_id" class="col-form-label">{{ __('* Produto') }}</label>

                                <select id="produto_id" type="text" class="form-control @error('produto_id') is-invalid @enderror" name="produto_id" autocomplete="produto_id" required>
                                    <option selected disabled>-- Selecione --</option>

                                    @foreach($produtos as $item)
                                    <option value="{{ __($item->id) }}" @if ( old('produto_id', $model->produto_id ?? '' ) == $item->id ) {{ 'selected' }} @endif>{{ __($item->nome) . " - " . __($item->categoria->nome) . " - " . __($item->cor->nome). " - " . __($item->tamanho->nome) . " - R$ " . __($item->precoBR()) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="quantidade" class="col-form-label">{{ __('* Quant.') }}</label>

                                <select id="quantidade" type="text" class="form-control @error('quantidade') is-invalid @enderror" name="quantidade" autocomplete="quantidade" required>
                                   
                                    <option value="1" @if ( old('quantidade', $model->quantidade ?? '' ) == 1 ) {{ 'selected' }} @endif>{{ __("1 Unidade") }}</option>
                                    <option value="2" @if ( old('quantidade', $model->quantidade ?? '' ) == 2 ) {{ 'selected' }} @endif>{{ __("2 Unidades") }}</option>
                                    <option value="3" @if ( old('quantidade', $model->quantidade ?? '' ) == 3 ) {{ 'selected' }} @endif>{{ __("3 Unidades") }}</option>
                                    <option value="4" @if ( old('quantidade', $model->quantidade ?? '' ) == 4 ) {{ 'selected' }} @endif>{{ __("4 Unidades") }}</option>
                                    <option value="5" @if ( old('quantidade', $model->quantidade ?? '' ) == 5 ) {{ 'selected' }} @endif>{{ __("5 Unidade") }}</option>
                                    <option value="6" @if ( old('quantidade', $model->quantidade ?? '' ) == 6 ) {{ 'selected' }} @endif>{{ __("6 Unidade") }}</option>
                                                              
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label for="valor_compra" class="col-form-label text-md-right">{{ __('* Preço de Compra (R$)') }}</label>
                                <input id="valor_compra" type="text" class="form-control @error('valor_compra') is-invalid @enderror mask_moeda_real" name="valor_compra" value="{{ old('valor_compra', $model->valor_compra ?? '') }}" autocomplete="valor_compra" required maxlength="10">

                                @error('valor_compra')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="data_compra" class="col-form-label text-md-right">{{ __('* Data de Compra (R$)') }}</label>
                                <input id="data_compra" type="text" class="form-control @error('data_compra') is-invalid @enderror datepicker" name="data_compra" value="{{ old('data_compra', $data_compra ?? '') }}"  required>

                                @error('data_venda')
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

                                <a href="{{ route('estoque_produtos') }}" class="btn btn-danger">
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
        
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            language: 'pt-BR',
            endDate: '{{__(date("d/m/Y"))}}',
            todayBtn: 'linked',
            todayHighlight: true,
        });

        $('.mask_moeda_real').mask("#.##0,00", {
            reverse: true
        });


    });
</script>
@endsection