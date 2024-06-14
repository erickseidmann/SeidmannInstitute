<?php
// Definindo o tipo de conteúdo como PDF
header('Content-Type: application/pdf');

// Definindo o cabeçalho Content-Disposition para exibir o PDF no navegador (inline)
header('Content-Disposition: inline; filename="EPBL1.pdf"');

// Lendo e enviando o arquivo PDF
readfile('EPBL1old.pdf');
?>
