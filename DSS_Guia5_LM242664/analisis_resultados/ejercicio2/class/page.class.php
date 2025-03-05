<?php
class Page
{
  public function display()
  {
    echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>" . $this->getTitle() . "</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: #f4f4f9;
                    color: #333;
                }
                nav ul {
                    list-style: none;
                    padding: 0;
                    margin: 0;
                    display: flex;
                    background-color: #0056b3;
                }
                nav ul li {
                    margin: 0;
                }
                nav ul li a {
                    display: block;
                    padding: 15px 20px;
                    color: #fff;
                    text-decoration: none;
                }
                nav ul li a:hover {
                    background-color: #004099;
                }
                main {
                    padding: 20px;
                    max-width: 1200px;
                    margin: auto;
                }
                h1 {
                    color: #0056b3;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }
                table th, table td {
                    border: 1px solid #ddd;
                    padding: 10px;
                    text-align: left;
                }
                table th {
                    background-color: #0056b3;
                    color: #fff;
                }
                img {
                    margin-top: 20px;
                    max-width: 100%;
                    border-radius: 10px;
                }
            </style>
        </head>
        <body>";
    $this->menu();
    echo "<main>";
    $this->content();
    echo "</main></body></html>";
  }

  protected function getTitle()
  {
    return "Mi Sitio Web";
  }

  protected function menu()
  {
    echo "<nav>
            <ul>
                <li><a href='home.php'>Home</a></li>
                <li><a href='contacto.php'>Contacto</a></li>
                <li><a href='carreras.php'>Carreras</a></li>
                <li><a href='institucional.php'>Institucional</a></li>
            </ul>
        </nav>";
  }

  protected function content()
  {
    echo "Contenido por defecto.";
  }
}
