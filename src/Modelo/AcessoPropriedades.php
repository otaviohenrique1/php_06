<?php

namespace Alura\Banco\Modelo;

trait AcessoPropriedades
{
  function __get(string $nomeAtributo)
  {
    // ucfirst => primeira letra em maiusculo
    $metodo = 'recupera' . ucfirst($nomeAtributo);
    return $this->$metodo();
  }

  function __set(string $nomeAtributo, $valor)
  {
    // ucfirst => primeira letra em maiusculo
    $metodo = 'altera' . ucfirst($nomeAtributo);
    $this->$metodo($valor);
  }
}
