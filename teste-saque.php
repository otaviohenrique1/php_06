<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\Conta\{Titular, ContaPoupanca, ContaCorrente, Conta};
use Alura\Banco\Modelo\{CPF, Endereco};

$conta = new ContaCorrente(
  new Titular(
    new CPF('123.456.789-10'),
    'Vinicius Dias',
    new Endereco('Petropolis', 'bairro Teste', 'Rua lá', '37')
  )
);


$conta->deposita(500);
$conta->saca(100);
echo $conta->recuperaSaldo();
