<?php

namespace Alura\Banco\Service;

use Alura\Banco\Modelo\Funcionario\Funcionario;

// Classe de servico
class ControladorDeBonificacoes
{
  private float $totalBonicicacoes = 0;

  public function adicionaBonificacao(Funcionario $funcionario) {
    $this->totalBonicicacoes += $funcionario->calculaBonificacao();
  }

  public function recuperaTotal(): float
  {
    return $this->totalBonicicacoes;
  }
}
