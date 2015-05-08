<?php

// Recuperando imagem em base64
// Exemplo: data:image/png;base64,AAAFBfj42Pj4
$imagem = $_POST['imagem'];

// Separando tipo dos dados da imagem
// $tipo: data:image/png
// $dados: base64,AAAFBfj42Pj4
list($tipo, $dados) = explode(';', $imagem);

// Isolando apenas o tipo da imagem
// $tipo: image/png
list(, $tipo) = explode(':', $tipo);

// Isolando apenas os dados da imagem
// $dados: AAAFBfj42Pj4
list(, $dados) = explode(',', $dados);

// Convertendo base64 para imagem
$dados = base64_decode($dados);

// Gerando nome aleatório para a imagem
$nome = md5(uniqid(time()));

// Salvando imagem em disco
file_put_contents("../img/{$nome}.jpg", $dados);