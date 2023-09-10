<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>populando banco</title>
</head>
<body>
<?php
//imprimindo os times
$vData_ = date("Y-m-dH:i:s");
$time_start = microtime(true);

echo "<br> inicio:".$vData_;
echo " ".$time_start;

//adapatar para conectar no banco do USBWebServer
$mysqli = new mysqli("a","b",'c',"",3306);

$comando="use loja;";
$mysqli->query($comando);

//adapatar para criar tabela do produto
$comando="CREATE TABLE if not exists template (
    id int(255) unsigned NOT NULL auto_increment,
    nome varchar(50) default NULL,
    numero  int(10) unsigned default NULL,
    datacadastro datetime default NULL,
    PRIMARY KEY  (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";
$mysqli->query($comando);


//inserindo os registros
//colocar código do listar.php
for ($i=1; $i<=10; $i++){
    $j=$i*34;
    $random=rand(1,999999);
    $data = date("Y-m-d H:i:s");
    $nome="'"."Marcelo".$j."'";
    $vQuery="INSERT INTO template(".
    "nome,".
    "numero,".
    "datacadastro".
    ") VALUES (".
    $nome.", ".
    $random.", '".
    $data."' )";
    //$vDB->BeginTrans();
    $mysqli->query($vQuery);
    if(!$mysqli){
        //$vDB->RollbackTrans();
        die("<br>Ocorreu um erro na execucao de<br>".$vQuery);
        $vDB->Close();
    }else{
        //$vDB->CommitTrans();
        echo "<br>inserido =>".$vQuery;
    }

}

//imprimindo os times finais
$vData_ = date("Y-m-dH:i:s");
$time_end = microtime(true);
echo "<br>fim".$vData_;
echo " fim microtme ".$time_end;

//calculando o tempo total
$time = $time_end - $time_start;
echo "<br> tempo de processamento do Insert=>".$time;

?>
</body>
</html>
