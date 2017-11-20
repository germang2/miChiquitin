@extends('layouts.app')

@section('titulo')
    BALANCE
    <?php
    function numhash($n) {
        return (((0x0000FFFF & $n) << 16) + ((0xFFFF0000 & $n) >> 16));
    }
    ?>
@endsection


@section('content')
    @if (Session::get('msg') )
        <div class="alert alert-{{ Session::get('msg')['tipo'] }} alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {!! Session::get('msg')['msg'] !!}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <input type="text" class="data text-center" value="{{$date}}">
            </div>

        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-12">
            <div class="loaderIn"> </div>
            <div class="row">
                <div class="col-sm-14">
                    <label for="fGrDir" class="col-sm-2 control-label">EMPLEADO</label>
                    <div class="col-sm-10 selectEm">
                        {!! Form::select('id_municipio', [], null, [
                                    'class' => 'form-control',
                                    'style' => 'width:100%;',
                                    'placeholder'=>'Municipio',
                                    'required',
                                    'id' => 'sEm'
                                ]
                            ) !!}
                    </div>
                </div>
            </div>
            <br>

            <div class="loaderEm"> </div>
            <br>
            <div class="row">
                <div class="col-sm-14">

                    <label for="fGrGrado" class="col-sm-1 control-label">PAGO</label>
                    <div class="col-sm-3">

                        {!! Form::hidden('nId', null, ['id' => 'nId'])!!}
                        {!! Form::input('number', 'base', 0, [
                            'class' => 'form-control',
                            'min' => '0',
                            'placeholder' => 'Base',
                            'required',
                            'id' => 'base'
                ]) !!}
                    </div>
                    <label for="fGrIn" class="col-sm-2 control-label">EPS/PENSION</label>
                    <div class="col-sm-3">
                        {!! Form::input('number', 'eps', 0, [
                            'class' => 'form-control',
                            'min' => '0',
                            'placeholder' => 'EPS',
                            'required',
                            'id' => 'salud',
                            'disabled' => true
                ]) !!}

                    </div>

                    <div class="col-sm-3">
                        {!! Form::input('number', 'pension', 0, [
                            'class' => 'form-control',
                            'min' => '0',
                            'placeholder' => 'PENSION',
                            'required',
                            'id' => 'pension',
                            'disabled' => true
                    ]) !!}
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-14">
                    <label for="fGrGrado" class="col-sm-4 control-label">AUX TRANSPORTE</label>
                    <div class="col-sm-4">


                        {!! Form::input('number', 'aux', 0, [
                            'class' => 'form-control',
                            'min' => '0',
                            'placeholder' => 'Base',
                            'required',
                            'id' => 'aux_transporte'
                ]) !!}
                    </div>
                    <label for="fGrIn" class="col-sm-1 control-label">ARL</label>
                    <div class="col-sm-3">
                        {!! Form::input('number', 'eps', 0, [
                            'class' => 'form-control',
                            'min' => '0',
                            'placeholder' => 'ARL',
                            'required',
                            'id' => 'arl',
                            'disabled' => true
                ]) !!}

                    </div>

                </div>
            </div>
            <br>
            <hr />
            <br>

            <div class="row">
                <div class="col-sm-14">
                    <label for="fGrGrado" class="col-sm-4 control-label">NETO EMPLEADO</label>
                    <div class="col-sm-3">


                        {!! Form::input('number', 'neto', 0, [
                            'class' => 'form-control',
                            'min' => '0',
                            'placeholder' => 'NETO',
                            'required',
                            'id' => 'neto',
                            'disabled' => true
                ]) !!}
                    </div>
                    <label for="fGrIn" class="col-sm-2 control-label">TOTAL EMPRESA</label>
                    <div class="col-sm-3">
                        {!! Form::input('number', 'tot', 0, [
                            'class' => 'form-control',
                            'min' => '0',
                            'placeholder' => 'TOTAL',
                            'required',
                            'id' => 'total',
                            'disabled' => true
                ]) !!}

                    </div>

                </div>
            </div>
        </div>
    </div>







@endsection

@section('jsAdicional')
    <script>




        $('.data').datepicker({
            format: "{{$format}}",
            startView: 1,
            minViewMode: {{$min}},
            todayBtn: "linked"
        });

        $('.data').datepicker()
            .on('changeDate', function(e) {
                return false;
                // `e` here contains the extra attributes
                e.preventDefault();
                var date = $('.data').val();
                $.ajax({
                    url: $('#urlAct').html() + '/nominas/ajax',
                    type: 'post',
                    data: {
                        dt : date,
                        _token : $('input[name="_token"]').val()
                    },
                    beforeSend: function() {
                        $('#tbNominas tbody').empty();
                        $('.loaderIn').append('<img id="#imgld" height="70" width="200" src="/assets/img/loader.gif">');
                    },
                    success:function(respuesta) {
                        console.log(respuesta);
                        var html = '';
                        if (respuesta.ok) {
                            for (i = 0; i < respuesta.dat.length; i++) {

                                html +=
                                    '<tr class="text-center" id="es' + respuesta.dat[i].id +'">'+
                                    '<td class="text-center" >' +
                                    respuesta.dat[i].id3 +
                                    '</td>' +
                                    '<td class="text-center" >' +
                                    respuesta.dat[i].id2 +
                                    '</td>' +
                                    '<td class="text-center" >' + respuesta.dat[i].nom + '</td>' +
                                    '<td class="text-center">' + respuesta.dat[i].app + '</td>' +
                                    '<td class="text-center" >' + respuesta.dat[i].f_pre + '</td>' +
                                    '<td class="text-center" >' + respuesta.dat[i].f_pag + '</td>' +
                                    '<td class="text-center" >' + respuesta.dat[i].tot + '</td>' +
                                    '<td class="text-center" >' + respuesta.dat[i].estado + '</td>' +
                                    '<td class="text-center">' +
                                    '<a href="#" class="verNomina btn btn-success" ' +
                                    'miVlr="' + respuesta.dat[i].id  + '">'  +
                                    '<span class="fa fa-search"></span> Ver' +
                                    '</a>' +
                                    '</td>' +
                                    '</tr>';
                            }
                        } else {
                            // mostramos el error generado de la ejecución ajax
                            $('#tbNominas tbody').empty();
                            html = '<tr colspan="6" class="tx16 txC">' +
                                '<td class="danger">' + respuesta.err +'</td>' +
                                '</tr>';
                        }
                        $('.loaderIn img').remove();
                        $('#tbNominas tbody').empty().append(html);
                    }
                });
            });

    </script>
@endsection