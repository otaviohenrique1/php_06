<?php

namespace Alura\Banco\Modelo\Funcionario;

use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Pessoa;

abstract class Funcionario extends Pessoa
{
  private float $salario;

  public function __construct(string $nome, CPF $cpf, float $salario)
  {
    parent::__construct($nome, $cpf);
    $this->salario = $salario;
  }

  public function recuperaSalario(): float
  {
    return $this->salario;
  }

  public function alteraNome(string $nome) : void {
    $this->nome = $nome;
  }

  public function recebeAumento(float $valorAumento): void {
    if ($valorAumento < 0) {
      echo "Aumento deve ser positivo";
      return;
    }

    $this->salario += $valorAumento;
  }

  /* remover */
  // function calculaBonificacao(): float
  // {
  //   return $this->salario * 0.1;
  // }
  abstract function calculaBonificacao(): float;
}
