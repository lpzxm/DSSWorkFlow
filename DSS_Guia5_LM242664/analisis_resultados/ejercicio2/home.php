<?php
require_once './class/page.class.php';

class Home extends Page
{
    protected function content()
    {
        echo "<h1>Bienvenido a nuestro sitio web</h1>";
        echo "<p>Esta es la página de inicio. Aquí puedes encontrar información general sobre nosotros.</p>";
    }
}

$page = new Home();
$page->display();
