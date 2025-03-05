<?php
require_once './class/page.class.php';

class Carreras extends Page
{
    protected function content()
    {
        echo "<h1>Carreras</h1>";
        echo "<p>Explora las distintas carreras que ofrecemos:</p>";
        echo "<table>
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
        echo "<img src='images/carreras.jpg' alt='Imagen de Carreras'>";
    }
}

$page = new Carreras();
$page->display();
