<?php

namespace Alura\Banco\Modelo\Conta;

class Conta
{
  private Titular $titular;
  private float $saldo;
  private static int $numeroDeContas = 0;

  public function __construct(Titular $titular)
  {
    // echo "Criando uma nova conta" . PHP_EOL;
    $this->saldo = 0;
    $this->titular = $titular;
    self::$numeroDeContas++;
    // self => Conta
  }

  public function __destruct()
  {
    // if (self::$numeroDeContas > 2) {
    //   echo "Há mais de uma conta ativa";
    // }
    self::$numeroDeContas--;
  }

  public static function recuperaNumeroDeContas(): int
  {
    return self::$numeroDeContas;
  }

  public function saca(float $valorASacar)
  {
    if ($valorASacar > $this->saldo) {
      echo "Saldo indisponível";
      return;
    }
    $this->saldo -= $valorASacar;
  }

  public function deposita(float $valorADepositar): void
  {
    if ($valorADepositar < 0) {
      echo "Valor precisa ser positivo";
      return;
    }
    $this->saldo += $valorADepositar;
  }

  public function transfere(float $valorATransferir, Conta $contaDestino): void
  {
    if ($valorATransferir > $this->saldo) {
      echo "Saldo indisponível";
      return;
    }
    $this->saca($valorATransferir);
    $contaDestino->deposita($valorATransferir);
  }

  public function recuperaSaldo(): float
  {
    return $this->saldo;
  }

  // public function defineCpfTitular(string $cpf): void
  // {
  //   $this->cpfTitular = $cpf;
  // }

  public function recuperaCpfTitular(): string
  {
    return $this->titular->recuperaCpf();
  }

  // public function defineNomeTitular(string $nome): void
  // {
  //   $this->nomeTitular = $nome;
  // }

  public function recuperaNomeTitular(): string
  {
    return $this->titular->recuperaNome();
  }
}
