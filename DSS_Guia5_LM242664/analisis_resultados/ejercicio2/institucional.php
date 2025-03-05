<?php
require_once './class/page.class.php';

class Institucional extends Page
{
    protected function content()
    {
        echo "<h1>Institucional</h1>";
        echo "<p>Bienvenido a la sección institucional de nuestra universidad. Aquí encontrarás información relevante sobre nuestra misión, visión y valores.</p>";
        echo "<section style='display:flex; gap:20px; margin-top:20px;'>
                <div style='flex:1;'>
                    <h2>Misión</h2>
                    <p>Formar profesionales altamente competentes, con valores éticos y un compromiso social sólido.</p>
                </div>
                <div style='flex:1;'>
                    <h2>Visión</h2>
                    <p>Ser una institución líder en educación superior, reconocida a nivel internacional por la calidad de sus programas académicos.</p>
                </div>
             </section>";
        echo "<img src='images/institucional.jpg' alt='Imagen Institucional'>";
    }
}

$page = new Institucional();
$page->display();
