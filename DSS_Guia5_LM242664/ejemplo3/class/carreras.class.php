<?php
require_once 'page.class.php';

class Carreras extends Page
{
    protected function content()
    {
        echo "<h1>Carreras</h1>";
        echo "<p>Explora las distintas carreras que ofrecemos:</p>";
        echo "<table border='1' style='width:100%; text-align:left;'>
                <tr>
                    <th>Facultad</th>
                    <th>Carrera</th>
                    <th>Duración</th>
                </tr>
                <tr>
                    <td>Ingeniería</td>
                    <td>Ingeniería en Sistemas</td>
                    <td>5 años</td>
                </tr>
                <tr>
                    <td>Administración</td>
                    <td>Administración de Empresas</td>
                    <td>4 años</td>
                </tr>
                <tr>
                    <td>Ciencias</td>
                    <td>Matemáticas Aplicadas</td>
                    <td>4 años</td>
                </tr>
              </table>";
        echo "<img src='images/carreras.jpg' alt='Imagen de Carreras' style='width:100%; margin-top:20px;'>";
    }
}

$page = new Carreras();
$page->display();
