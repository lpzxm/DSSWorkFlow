<?php
require_once './class/page.class.php';

class Contacto extends Page
{
    protected function content()
    {
        echo "<h1>Contacto</h1>";
        echo "<p>Envíanos tus consultas a través del siguiente formulario.</p>";
        echo "<form method='post' action='enviar.php' style='max-width: 600px; margin: auto;'>
                <label for='nombre'>Nombre:</label>
                <input type='text' id='nombre' name='nombre' style='width: 100%; padding: 10px; margin-bottom: 10px;'><br>
                <label for='email'>Email:</label>
                <input type='email' id='email' name='email' style='width: 100%; padding: 10px; margin-bottom: 10px;'><br>
                <label for='mensaje'>Mensaje:</label>
                <textarea id='mensaje' name='mensaje' rows='4' style='width: 100%; padding: 10px;'></textarea><br><br>
                <input type='submit' value='Enviar' style='padding: 10px 20px; background-color: #0056b3; color: #fff; border: none; cursor: pointer;'>
              </form>";
    }
}

$page = new Contacto();
$page->display();
