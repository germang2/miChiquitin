<style>
    #fullModal {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
    }

    #fullCont {
        height: auto;
        min-height: 100%;
        border-radius: 0;
    }
</style>

<div class="modal fade" id="mNominasP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div id="fullModal" class="modal-dialog" role="document">
        <div id="fullCont" class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Pedidos Por Pagar</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">

                        <table class="table table-bordered table-condensed table-hover" id="tbNominasP">
                            <thead>
                            <tr>
                                <th>Id Empleado</th>
                                <th>Email</th>
                                <th>Nombres</th>
                                <th>Appellidos</th>
                                <th>Fecha Prenomina</th>
                                <th>Fecha Pago</th>
                                <th>Pago Total</th>
                                <th>Estado</th>
                                <th>Ver</th>
                            </tr>
                            </thead>
                            <div class="loaderPed pull-right"> </div>
                            <tbody>
                            @foreach($nominasP as $nominaP)
                                <tr>
                                    <td>
                                        <?php
                                        echo numHash($nominaP->empleado->user->id);
                                        ?>
                                    </td>
                                    <td>{{ $nominaP->empleado->user->email }}</td>
                                    <td>{{ $nominaP->empleado->user->name }} </td>
                                    <td>{{$nominaP->empleado->user->apellidos}}</td>
                                    <td>
                                        {{ $nominaP->fecha_prenomina}}
                                    </td>
                                    <td>@if(!is_null($nominaP->fecha_pago))
                                            {{$nominaP->fecha_pago}}
                                        @endif</td>
                                    <td>{{$nominaP->base + ( 3 * $nominaP->salud) + $nominaP->aux_transporte}}</td>
                                    <td>
                                        {{ $nominaP->estado}}
                                    </td>
                                    <td>
                                        <a href="#" class="pagarN btn btn-success"
                                           miVlr="{{Hashids::encode($nominaP->id)}}" >
                                            <span class="fa fa-money"></span> Pagar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="mGrOk">Guardar</button>
            </div>
        </div>
    </div>
</div>