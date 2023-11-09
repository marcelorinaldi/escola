<?php
session_start();
//echo "<pre>";
//print_r($_POST);
//print_r($_FILES); 

include('banco.php');
include('class.php');
$db = new banco;



$TESTE = $_POST['salva_aluno'];
if(isset($TESTE)){
   

    if (isset($_FILES['foto'])) {  // compara se existe a variável
        $foto[] = $_FILES['foto'];
        if ($foto[0]['error'] < 1) {
          $f_nome = $foto[0]['name'];
          $f_ext = $foto[0]['type'];
          $f_caminho = $foto[0]['tmp_name'];
          $foto = file_get_contents($f_caminho);
          $foto = 'data:' . $f_ext . ';base64,' . base64_encode($foto);
        //  echo "tem foto";

        }else{
           // echo "nao tem foto";   
            $foto = "";   
        } 
    }


    $nome = $_POST['nome'];
    $data1 = $_POST['data'];

    date_default_timezone_set('America/Sao_Paulo');
    $data2  = date("Y-m-d");

   $datetime1 = new DateTime($data1);
   $datetime2 = new DateTime($data2);
   $interval = $datetime1->diff($datetime2);
   //$idade = $interval->format('%y anos, %m meses');
   $idade = $interval->format('%y');

    if($idade < 11){
        $sexta = "Junior";
        $turma = 1;
    }else if($idade >=11 and $idade <18){
        $sexta = "Juvenil";
        $turma = 2;
    }else{
       $sexta= "Senior";
        $turma = 3;
    }

    
    /*  echo "<br>";
    echo $nome;
    echo "<br>";
    echo $turma;
    echo "<br>";
    echo $data_nasc = $data1;  */

   $brunao = ['nome' => mysqli_real_escape_string($db->conn, $nome),
    'turma_idturma' => mysqli_real_escape_string($db->conn, $turma),
    'data_nasc' => mysqli_real_escape_string($db->conn, $data1),
    'foto' => mysqli_real_escape_string($db->conn, $foto)];

    //print_r($brunao);
   $salva_aluno = new aluno;
   $resultado = $salva_aluno->criar($brunao);
  // echo "<hr>";
 //  echo $resultado;


   if($resultado == 1){
           // echo "deu certo";
            $_SESSION['sms'] = "Bem vindo(a) a turma: &nbsp;".$sexta;
    header('location: cadastro.php');
   }else{
           // echo "foi mal";
            $_SESSION['sms'] = "nao salvou";
    header('location: cadastro.php');
   }


}else{
    //echo "deu errado";
    $_SESSION['sms'] = "O Sr esta de brincadeira";
    header('location: index.php');
}

?>