<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$arq=fopen("produtos.csv","r");
$linha=fgets($arq);
echo "Produto ";
echo "Preço";
echo "<hr>";
$conta=1;
while($linha){
    $produtoPreco=explode("\t",$linha);
    echo $conta++;
    echo " ";
    echo $produtoPreco[0];
    echo " ";
    echo $produtoPreco[1];
    echo "<br>";
    $linha=fgets($arq);
}
?>
</body>
</html>