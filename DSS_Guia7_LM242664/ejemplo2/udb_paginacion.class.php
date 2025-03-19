<?php
//Definición de la clase
class paginacion
{
    private $numpage;
    private $totalpages;
    private $links;
    private $offset;

    public function __construct()
    {
        $this->numpage = 1;
        $this->totalpages = 1;
        $this->links = array();
        $this->offset = 0;
    }

    public function getnumpages($page)
    {
        $this->numpage = (int)$page;
        if ($this->numpage < 1) {
            $this->numpage = 1;
        }
        return $this->numpage;
    }

    public function getoffset($limit)
    {
        $this->offset = (($this->numpage) - 1) * $limit;
        return $this->offset;
    }

    public function gettotalpages($total, $limit)
    {
        $this->totalpages = ceil($total / $limit);
        return $this->totalpages;
    }

    public function showlinkspages($total, $limit)
    {
        $totpages = $this->gettotalpages($total, $limit);
        for ($i = 1; $i <= $totpages; $i++) {
            $this->links[] = ($i == $this->numpage) ? $i : "<a href=\"?npag=$i&limit=$limit\">$i</a>";
        }
        return implode(" - ", $this->links);
    }
}
