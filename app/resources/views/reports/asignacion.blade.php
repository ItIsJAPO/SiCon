<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
    <title>Hello, world!</title>
</head>
<body>

<center><h3>DIRECCIÓNDE DESARROLLO DE SISTEMAS INFORMÁTICOS</h3></center>


<p style="text-align: right; padding: 25px; margin-bottom: 50px">
    San Francisco de Campeche, Campeche a {{$fecha->format('d')}} de {{$fecha->format('F')}} del {{date('Y')}}
</p>
<p style="margin: 4px; font-size: large">
    <strong> P R E S E N T E</strong>
</p>
<p style="margin: 4px; font-style: italic">
    {{$user->name}}
</p>
<p style="margin: 4px; ">
    {{$user->cargo}}
</p>
<p style="margin: 4px; ">
    {{$user->unidadAdministrativa->nombre}}
</p>

<p style="text-align: justify; margin-top: 100px; ">
    Por este conducto, me permito informar que se le a asignado el equipo <strong>{{$device->nombre}}</strong> con el con folio <strong>{{$device->folio}}</strong>
    para el mejor desarrollo de sus funciones, quien a partir del día {{$fecha->format('d')}} de {{$fecha->format('F')}} del presente año se compromete a resguardarlo y darle un uso estrictamente laboral.

    Asimismo, hacemos de su conocimiento que no podrá modificar la configuración del equipo ni instalar software sin ser previamente autorizado
</p>

<p>
    Sin más por el momento, aprovecho la ocasión para enviarle un cordial y afectuoso saludo.
</p>

<BR>
<center ><p style="margin-top: 100px;">ATENTAMENTE</p>

<p>
    ________________________
    <br>
    Juan Aguilar
</p>

</center>
</body>
</html>



