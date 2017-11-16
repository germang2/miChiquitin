<!DOCTYPE html>
<html><body>
        <H1 align="center">PAZ Y SALVO</H1>
        <table class="table table-striped table-bordered">
        <tbody>
        @foreach($paz as $pac)
            <tr>
              <td>Dado el {{ $pac->fecha }}</td>
              <td>En Pereira</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <p>Almacen mi chiquitin<p><br/><br/>
    <p>Por medio de la presnete se permite validar que el (Usuario) se encuentra a paz y salvo con la deuda No. {{ $pac->id_deuda }} donde realizo el pago por valor de (valor deuda )</p>
    <p>Att: Gerencia Mi Chiquitin</p>
  </body>
</html>