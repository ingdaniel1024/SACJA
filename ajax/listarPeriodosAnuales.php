<?php
require('../proc/conexion.php');
	if (hayPeriodos()) {
        $buscar=hayPeriodos();
        echo '<hr>';
        echo '<h2>Listado de periodos</h2>';
        echo '<table class="table table-striped">
                <thead>
                    <tr>
                        <th>Periodo</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha de Fin</th>
                        <th>Activo</th>
                    </tr>
                </thead>
                <tbody>';
        while($a=$buscar->fetch_array()){
            $nombrePeriodo = $a['nombrePeriodo'];
            $fechaInicio = $a['fechaInicio'];
            $fechaFin = $a['fechaFin'];
            $estaActivo = $a['estaActivo'];
            $fechaInicio = date("d-m-Y", strtotime($fechaInicio));
            $fechaFin = date("d-m-Y", strtotime($fechaFin));
            if ($estaActivo) {
                $boton = '<button type="button" class="btn btn-success btn-sm">
                                Activo
                            </button>';
            } else {
                $boton = '<button type="button" class="btn btn-danger btn-sm">
                                No activo
                            </button>';
            }
            
            echo '<tr>
                    <td>'.$nombrePeriodo.'</th>
                    <td>'.$fechaInicio.'</td>
                    <td>'.$fechaFin.'</td>
                    <td>
                        <a href="#">'.$boton.'</a>
                    </td>
                </tr>';
        }
        echo '</tbody>
            </table>';
    }

    function hayPeriodos(){
        global $mysqli;
        global $idClub;

        $query = "SELECT * from periodosanuales";
        $buscar = $mysqli->query($query);

        if ($buscar->num_rows>0) {
            return $buscar;
        } else { return false; }
    }
?>