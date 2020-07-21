@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header text-white bg-dark">Registrar</div>

                <div class="card-body">

                    <!-- <form method="POST" action="{{ route('cadastrar_produto') }}"> -->
                    @csrf

                    @if(isset($clientes) && !is_null($clientes) && Count($clientes) > 0)

                    <div class="row">

                        <div class="col-md-6">
                            <label for="cliente_id" class="col-form-label">{{ __('* Cliente') }}</label>

                            <select id="cliente_id" type="text" class="form-control @error('cliente_id') is-invalid @enderror" name="cliente_id" autocomplete="cliente_id" required>
                                <option selected disabled>-- Selecione --</option>

                                @foreach($clientes as $item)
                                <option value="{{ __($item->id) }}" @if ( old('cliente_id', $model->cliente_id ?? '' ) == $item->id ) {{ 'selected' }} @endif>{{ __($item->nome) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="data_venda" class="col-form-label text-md-right">{{ __('* Data de Venda (R$)') }}</label>
                            <input id="data_venda" type="text" class="form-control @error('data_venda') is-invalid @enderror datepicker" name="data_venda" value="{{ old('data_venda', $data_venda ?? '') }}" required>

                            @error('data_venda')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="produto_id" class="col-form-label">{{ __('* Produto') }}</label>

                            <select id="produto_id" type="text" class="form-control @error('produto_id') is-invalid @enderror" name="produto_id" autocomplete="produto_id" required>
                                <option selected disabled>-- Selecione --</option>

                                @foreach($produtos as $item)
                                <option preco="{{ __($item->precoBR()) }}" value="{{ __($item->id) }}" @if ( old('produto_id', $model->produto_id ?? '' ) == $item->id ) {{ 'selected' }} @endif>{{ __($item->nome) . " - " . __($item->categoria->nome) . " - " . __($item->cor->nome). " - " . __($item->tamanho->nome) . " - R$ " . __($item->precoBR()) }}</option>
                                @endforeach
                            </select>
                            <span class="error_produto_id" class="text-danger"></span>
                        </div>

                        <div class="col-md-3">
                            <label for="quantidade" class="col-form-label">{{ __('* Quant.') }}</label>

                            <select id="quantidade" type="text" class="form-control @error('quantidade') is-invalid @enderror" name="quantidade" autocomplete="quantidade" required>

                                <option value="1" @if ( old('quantidade', $model->quantidade ?? '' ) == 1 ) {{ 'selected' }} @endif>{{ __("1 Unidade") }}</option>
                                <option value="2" @if ( old('quantidade', $model->quantidade ?? '' ) == 2 ) {{ 'selected' }} @endif>{{ __("2 Unidades") }}</option>
                                <option value="3" @if ( old('quantidade', $model->quantidade ?? '' ) == 3 ) {{ 'selected' }} @endif>{{ __("3 Unidades") }}</option>
                                <option value="4" @if ( old('quantidade', $model->quantidade ?? '' ) == 4 ) {{ 'selected' }} @endif>{{ __("4 Unidades") }}</option>
                                <option value="5" @if ( old('quantidade', $model->quantidade ?? '' ) == 5 ) {{ 'selected' }} @endif>{{ __("5 Unidades") }}</option>
                                <option value="6" @if ( old('quantidade', $model->quantidade ?? '' ) == 6 ) {{ 'selected' }} @endif>{{ __("6 Unidades") }}</option>

                            </select>
                        </div>



                        <div class="col-md-1">
                            <a href="#" class="btn btn-block btn-dark btn-add-produto">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover table-produtos">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Produto</th>
                                        <th scope="col">Quantidade</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">produto </th>
                                        <td> produto </td>
                                        <td> quantidade.text()</td>
                                        <td> <a href="javascript:void(0);" class="btn btn-danger btn-sm btn-remove-produto"> <i class="far fa-trash-alt"></i> </a>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <label for="sub_total_venda" class="col-form-label text-md-right">{{ __('* Total (R$)') }}</label>
                            <input id="sub_total_venda" type="text" class="form-control @error('sub_total_venda') is-invalid @enderror mask_moeda_real" name="sub_total_venda" value="{{ old('sub_total_venda', $sub_total_venda ?? '') }}" required readonly>

                            @error('sub_total_venda')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label for="valor_desconto_venda" class="col-form-label text-md-right">{{ __('*Valor do Desconto (R$)') }}</label>
                            <input id="valor_desconto_venda" type="text" class="form-control @error('valor_desconto_venda') is-invalid @enderror mask_moeda_real" name="valor_desconto_venda" value="{{ old('valor_desconto_venda', $valor_desconto_venda ?? '') }}" required>

                            @error('valor_desconto_venda')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label for="desconto_venda" class="col-form-label text-md-right">{{ __('* Desconto (%)') }}</label>
                            <input id="desconto_venda" type="text" class="form-control @error('desconto_venda') is-invalid @enderror mask_moeda_real" name="desconto_venda" value="{{ old('desconto_venda', $desconto_venda ?? '') }}" required>

                            @error('desconto_venda')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label for="valor_total_venda" class="col-form-label text-md-right">{{ __('* Valor Total (R$)') }}</label>
                            <input id="valor_total_venda" type="text" class="form-control @error('valor_total_venda') is-invalid @enderror mask_moeda_real" name="valor_total_venda" value="{{ old('valor_total_venda', $valor_total_venda ?? '') }}" required>

                            @error('valor_total_venda')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    @endif

                    <!-- </form> -->

                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('javascript')
<script>
    $(document).ready(function() {
        var _posicaoTabela = 0;

        $('.mask_moeda_real').mask("#.##0,00", {
            reverse: true
        });

        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            language: 'pt-BR',
            endDate: '{{__(date("d/m/Y"))}}',
            todayBtn: 'linked',
            todayHighlight: true,
        });

        $('.btn-add-produto').on('click', function(e) {
            e.preventDefault();
            var produto = $('#produto_id option:selected');
            var quantidade = $('#quantidade option:selected');

            if (produto.val() > 0) {
                var linha = " <tr> " +
                    " <th scope=\"row\"> " + produto.val() + " </th> " +
                    " <td> " + produto.text() + " </td> " +
                    " <td> " + quantidade.text() + " </td> " +
                    " <td>  <a href=\"javascript:void(0);\" class=\"btn btn-danger btn-sm btn-remove-produto\"> <i class=\"far fa-trash-alt\"></i> </a> " +
                    " </tr> ";


                $(".table-produtos tbody").append(linha);

                var subTotalVenda = $("#sub_total_venda").val();
                $("#sub_total_venda").val((produto.attr("preco")));
                console.log($("#sub_total_venda").val());

                _posicaoTabela++;
                $('.error_produto_id').text("");
            } else {
                $('.error_produto_id').text("É necessário escolher um produto!");
            }
        });
    });
</script>

<script>
    $(document).on('click', '.btn-remove-produto', function(e) {
        e.preventDefault();
        $(this).closest('tr').remove();
    });
</script>

@endsection