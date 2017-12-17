<?php
require_once("database.php");
class Paginacion
{
    public $pagina_actual;
    public $por_pagina;
    public $total_registros;
    function __construct($pagina=1,$por_pagina=10,$total=0)
    {
      $this->pagina_actual=$pagina;
      $this->por_pagina=$por_pagina;
      $this->total_registros=$total;
    }
    public function total_paginas()
    {
      /*
      ceil — Redondear fracciones hacia arriba
        echo ceil(4.3);    // 5
        echo ceil(9.999);  // 10
        echo ceil(-3.14);  // -3
      */
       return ceil($this->total_registros/$this->por_pagina);
    }
    public function pagina_siguiente()
    {
      return $this->pagina_actual+1;
    }
    public function pagina_anterior()
    {
      return $this->pagina_actual-1;
    }
    public function existe_siguiente()
    {
      return ($this->pagina_actual<$this->total_paginas());
    }
    public function existe_anterior()
    {
      return ($this->pagina_actual>1);
    }
    public  function offset()
    {
      // paginna actual =3  // del 21 al 30
      // registro or pagina =10
      // offset = 20
      return ($this->pagina_actual-1)*$this->por_pagina;
    }
}
