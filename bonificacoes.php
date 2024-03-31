<?php

require_once 'autoload.php';

use Alura\Banco\Service\ControladorDeBonificacoes;
use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Funcionario\{Desenvolvedor, Diretor, EditorVideo, Funcionario, Gerente};

$umFuncionario = new Desenvolvedor(
  'Vinicius Dias',
  new CPF('123.456.789-10'),
  1000
);

$umFuncionario->sobeDeNivel();

$umaFuncionario = new Gerente(
  'Patricia',
  new CPF('987.654.321-10'),
  3000
);

$umDiretor = new Diretor(
  'Ana Paula',
  new CPF('123.951.789-11'),
  5000
);

$umEditor = new EditorVideo(
  'Paulo',
  new CPF('456.987.231-11'),
  1500
);

$controlador = new ControladorDeBonificacoes();
$controlador->adicionaBonificacao($umFuncionario);
$controlador->adicionaBonificacao($umaFuncionario);
$controlador->adicionaBonificacao($umDiretor);
$controlador->adicionaBonificacao($umEditor);
echo $controlador->recuperaTotal();