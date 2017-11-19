<?php

namespace App\Http\Controllers\Contabilidad;

use App\Models\Contabilidad\nomina;
use App\Models\Contabilidad\pagoProveedores;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Vinkla\Hashids\Facades\Hashids;
use App\Models\Inventario\Pedido;
class pagoProveedoresCtr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dt = Carbon::now();
        $dt = $dt->format('Y-m');
        $str = $dt .'%';
        $pagos = pagoProveedores::where('fecha_pago', 'like', $str)->get();
        $pedidosR = Pedido::where('estado', '=','RechazadoCapital')->get();
        $pedidos = Pedido::where('estado', '=','EnEspera')->get();
        return view('Contabilidad.pagoProveedores')->with(
            [
                'date'=> $dt,
                'pagos' => $pagos,
                'pedidos' => $pedidos,
                'pedidosR' => $pedidosR
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function numhash($n) {
        return (((0x0000FFFF & $n) << 16) + ((0xFFFF0000 & $n) >> 16));
    }

    public function getPagos(Request $request){
        $rtJson    = [
            'ok' => false,
            'err' => 'No se encontraron resultados',
            'dat' => []
        ];
        $input = $request->all();
        $str = $input['dt'] . '%';
        $datos = pagoProveedores::where($input['tipo'], 'like', $str)->get();

        if(count($datos)>0){
            $rtJson['ok'] = true;
            $rtJson['err']='';
            foreach ($datos as $key => $dato) {
                if(!is_null($dato->pedido) or !is_null($dato->pedido->proveedor) or !is_null($dato->pedido->articulo)) {
                    $rtJson['dat'][$key] = [
                        'id'=> $this->numhash($dato->pedido->id),
                        'fo' => $dato->fecha_orden,
                        'pr' => $dato->pedido->proveedor->representante_legal,
                        'ar' => $dato->pedido->articulo->nombre,
                        'can' => $dato->pedido->cantidad,
                        'tot' => $dato->valor_pagar,
                        'fp' => $dato->fecha_pago,
                        'estado' => $dato->estado
                    ];
                }

            }
        }

        return $rtJson;
        //Hacer Seguridad
    }

    //FALTA HACER VALIDACION DE SI HAY SUFICIENTE PLATA
    public function pagarPedido(Request $request){
        $input = $request->all();
        $rtJson    = [
            'ok' => false,
            'err' => '',
        ];
        if($hash = Hashids::decode($input['idp'])){
            $pedido = Pedido::find($hash[0]);
            if(is_null($pedido)){
                $rtJson['err'] = 'No se encontró el pedido';
            }
            else{
                $dt = Carbon::now();
                $dt = $dt->format('Y-m-d');
                $pedido->update(['estado'=> 'Aprobado']);
                pagoProveedores::create([
                    'fecha_pago' => $dt,
                    'fecha_orden' => $pedido->fecha,
                    'valor_pagar' => $pedido->costo_total,
                    'id_pedido' => $pedido->id,
                    'estado' => 'Pagado'
                    ]
                );
                $rtJson['ok']= true;
            }
        }
        else{
            $rtJson['err'] = 'Algo salió con el identificador';
        }

        return $rtJson;
    }

    public function rechazarPedido(Request $request){
        $input = $request->all();
        $rtJson    = [
            'ok' => false,
            'err' => '',
        ];
        if($hash = Hashids::decode($input['idp'])){
            $pedido = Pedido::find($hash[0]);
            if(is_null($pedido)){
                $rtJson['err'] = 'No se encontró el pedido';
            }
            else{
                $pedido->update(['estado'=> 'RechazadoCapital']);
                $rtJson['ok']= true;
            }
        }
        else{
            $rtJson['err'] = 'Algo salió con el identificador';
        }

        return $rtJson;
    }
}
