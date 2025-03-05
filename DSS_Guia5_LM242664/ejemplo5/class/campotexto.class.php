<?php
// Clase abstracta para algún tipo de campo de formulario
abstract class CampoFormulario
{
    // Propiedades de la clase abstracta
    protected $idcampo;
    protected $etiqueta;
    protected $capaayuda;

    // Constructor de la clase
    function __construct($id, $etiq, $ayuda)
    {
        $this->idcampo = $id;
        $this->etiqueta = $etiq;
        $this->capaayuda = $ayuda;
    }

    // Método abstracto que será implementado por las clases hijas
    abstract function pinta_campo();

    protected function poner_eventos_js()
    {
        $cmd_js = 'document.getElementById("c_" + this.name).style.visibility';
        $cmd2_js = 'document.getElementById("c_" + this.name).style.display';
        return " onfocus='$cmd_js=\"visible\"; $cmd2_js=\"inline-block\";'"
            . " onblur='$cmd_js=\"hidden\"; $cmd2_js=\"none\"'";
    }

    protected function poner_capa_ayuda()
    {
        $s = "background: Lavender; border: 1px solid #4D274F; color: #7B0F86; ";
        $s .= "font: bold 0.85em 'Open Sans', Arial, Helvetica, sans-serif; ";
        $s .= "padding: 4px 6px; position: relative; display: none; visibility: hidden;";
        return "<span id='c_$this->idcampo' style='$s'>$this->capaayuda</span>\n";
    }
}

// Clase para un campo de formulario de tipo text
class CampoTexto extends CampoFormulario
{
    private $placeholder;
    private $maxcar;

    function __construct($id, $etiq, $ayuda, $placehold, $maxcar)
    {
        parent::__construct($id, $etiq, $ayuda);
        $this->placeholder = $placehold;
        $this->maxcar = $maxcar;
    }

    function pinta_campo()
    {
        echo "<div class='row'>\n";
        echo "<section class='col col-6'>\n";
        echo "<label for='$this->idcampo' class='input'>\n";
        echo "<i class='icon-prepend icon-user'></i>\n";
        echo "<input type='text' name='$this->idcampo' id='$this->idcampo' ";
        echo "placeholder='$this->placeholder' maxlength='$this->maxcar'";
        echo $this->poner_eventos_js() . " />\n";
        echo $this->poner_capa_ayuda();
        echo "</label></section></div>\n";
    }
}

// Clase para un campo de formulario tipo textarea
class CampoTextarea extends CampoFormulario
{
    private $placeholder;
    private $lineas;
    private $cols;

    function __construct($id, $etiq, $lineas, $cols, $ayuda, $placehold)
    {
        parent::__construct($id, $etiq, $ayuda);
        $this->placeholder = $placehold;
        $this->lineas = $lineas;
        $this->cols = $cols;
    }

    function pinta_campo()
    {
        echo "<section>\n";
        echo "<label for='$this->idcampo' class='textarea'>$this->etiqueta\n";
        echo "<textarea name='$this->idcampo' id='$this->idcampo' rows='$this->lineas' cols='$this->cols'";
        echo $this->poner_eventos_js() . ">";
        echo $this->placeholder . "</textarea>\n";
        echo $this->poner_capa_ayuda();
        echo "</label></section>\n";
    }
}

// Clase para un campo de formulario tipo checkbox
class CampoCheckbox extends CampoFormulario
{
    private $options;
    private $enlistados;

    function __construct($id, $etiq, $ayuda, $options, $enlistados = false)
    {
        parent::__construct($id, $etiq, $ayuda);
        $this->options = $options;
        $this->enlistados = $enlistados;
    }

    function pinta_campo()
    {
        echo "<section>\n";
        echo "<label>$this->etiqueta</label>\n";
        foreach ($this->options as $key => $value) {
            echo "<label class='checkbox'>\n";
            echo "<input type='checkbox' value='$value' name='{$this->idcampo}[]' id='{$this->idcampo}_$key' />\n";
            echo "<i class='fa-check'></i>$key</label>\n";
            echo $this->enlistados ? "<br />\n" : "";
        }
        echo "</section>\n";
    }
}

// Clase para un campo de selección tipo select
class CampoSelect extends CampoFormulario
{
    private $size;
    private $multiple;
    private $options;

    function __construct($id, $etiq, $ayuda, $size, $multiple, $options)
    {
        parent::__construct($id, $etiq, $ayuda);
        $this->size = $size;
        $this->multiple = $multiple;
        $this->options = $options;
    }

    function pinta_campo()
    {
        echo "<div class='row'>\n";
        echo "<label for='$this->idcampo' class='label col col-4'>$this->etiqueta</label><br />\n";
        echo "<section class='col col-5'><label class='select'>\n";
        echo "<select name='$this->idcampo' id='$this->idcampo' size='$this->size'";
        echo $this->multiple ? " multiple" : "";
        echo $this->poner_eventos_js() . ">\n";
        foreach ($this->options as $key => $value) {
            echo "<option value='$key'>$value</option>\n";
        }
        echo "</select>\n";
        echo $this->poner_capa_ayuda();
        echo "<i></i></label></section></div>\n";
    }
}

// Clase para un campo de formulario tipo submit
class CampoSubmit extends CampoFormulario
{
    private $value;

    function __construct($id, $etiq, $value, $ayuda)
    {
        parent::__construct($id, $etiq, $ayuda);
        $this->value = $value;
    }

    function pinta_campo()
    {
        echo "<input type='submit' name='$this->idcampo' id='$this->idcampo' value='$this->value' class='button'";
        echo $this->poner_eventos_js() . " />\n";
        echo $this->poner_capa_ayuda();
    }
}
