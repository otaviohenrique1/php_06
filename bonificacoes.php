<?php

require_once 'autoload.php';

use Alura\Banco\Service\ControladorDeBonificacoes;
use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Funcionario\{Desenvolvedor, Diretor, Funcionario, Gerente};

$umFuncionario = new Desenvolvedor(
  'Vinicius Dias',
  new CPF('123.456.789-10'),
  'Desenvolvedor',
  1000
);

$umaFuncionario = new Gerente(
  'Patricia',
  new CPF('987.654.321-10'),
  'Gerente',
  3000
);

$umDiretor = new Diretor(
  'Ana Paula', new CPF('123.951.789-11'),
  'Diretor', 5000
);

$controlador = new ControladorDeBonificacoes();
$controlador->adicionaBonificacao($umFuncionario);
$controlador->adicionaBonificacao($umaFuncionario);
$controlador->adicionaBonificacao($umDiretor);
echo $controlador->recuperaTotal();