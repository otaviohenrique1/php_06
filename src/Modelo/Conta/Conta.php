<?php

namespace Alura\Banco\Modelo\Conta;

abstract class Conta
{
  private Titular $titular;
  protected float $saldo;
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
    $tarifaSaque = $valorASacar * $this->percentualTarifa();
    $valorSaque = $valorASacar + $tarifaSaque;
    if ($valorSaque > $this->saldo) {
      echo "Saldo indisponível";
      return;
    }
    $this->saldo -= $valorSaque;
  }

  abstract protected function percentualTarifa(): float;
  // protected function percentualTarifa(): float
  // {
  //   return 0.05;
  // }

  public function deposita(float $valorADepositar): void
  {
    if ($valorADepositar < 0) {
      echo "Valor precisa ser positivo";
      return;
    }
    $this->saldo += $valorADepositar;
  }

  // public function transfere(float $valorATransferir, Conta $contaDestino): void
  // {
  //   if ($valorATransferir > $this->saldo) {
  //     echo "Saldo indisponível";
  //     return;
  //   }
  //   $this->saca($valorATransferir);
  //   $contaDestino->deposita($valorATransferir);
  // }

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
