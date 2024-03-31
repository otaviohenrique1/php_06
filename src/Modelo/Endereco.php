<?php

namespace Alura\Banco\Modelo;

/**
 * Class Endereco
 * @package Alura\Banco\Modelo
 * @property-read string $cidade
 * @property-read string $bairro
 * @property-read string $rua
 * @property-read string $numero
 */
final class Endereco
{
  use AcessoPropriedades;

  private string $cidade;
  private string $bairro;
  private string $rua;
  private string $numero;

  public function __construct(string $cidade, string $bairro, string $rua, string $numero)
  {
    $this->cidade = $cidade;
    $this->bairro = $bairro;
    $this->rua = $rua;
    $this->numero = $numero;
  }

  public function recuperaCidade(): string
  {
    return $this->cidade;
  }

  public function recuperaBairro(): string
  {
    return $this->bairro;
  }

  public function recuperaRua(): string
  {
    return $this->rua;
  }

  public function recuperaNumero(): string
  {
    return $this->numero;
  }

  function __toString()
  {
    return "{$this->rua}, {$this->numero}, {$this->bairro}, {$this->cidade}";
  }

  // function __get(string $nomeAtributo)
  // {
  //   // ucfirst => primeira letra em maiusculo
  //   $metodo = 'recupera' . ucfirst($nomeAtributo);
  //   return $this->$metodo();
  // }

  // function __set(string $nomeAtributo, $valor)
  // {
  //   // ucfirst => primeira letra em maiusculo
  //   $metodo = 'altera' . ucfirst($nomeAtributo);
  //   $this->$metodo($valor);
  // }
}
