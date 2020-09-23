<?php 

// <--- GUIDES --->
// project
// cb  - COMMERCIAL BUILDING
// rb  - RESIDENTIAL BUILDING
// lp  - LARGE PROJECT
// gp  - GOVERNMENT PROJECT
// storey
// 2sa - 3 STOREY AND ABOVE / MINOR REPAIRS
// 2sb - 2 STOREY AND BELOW / MINOR REPAIRS
// cost
// 3ma - 3 MILLION AND ABOVE PROJECT COST
// 3mb - 3 MILLION AND BELOW PROJECT COST
// worker
// 10b - 10 WORKERS AND BELOW
// 11a - 11 WORKERS AND ABOVE
 



session_start();

if (isset($_SESSION['u_id'])){

    if (isset($_POST['submit'])){
        $pro = $_POST['project'];
        $sto = $_POST['storey'];
        $cos = $_POST['cost'];
        $wor = $_POST['worker'];
        header("Location: ../../cshpapplication.php?pro=$pro&sto=$sto&cos=$cos&wor=$wor");
        /*if($_POST['project'] === "cb" AND $_POST['cost'] === "3ma" AND $_POST['storey'] === "2sa" || $_POST['project'] === "rb" AND $_POST['cost'] === "3ma" AND $_POST['storey'] === "2sa"){
            header("Location: ../../cshpapplication.php?classification=compre");
        }elseif($_POST['project'] === "cb" AND $_POST['cost'] === "3ma" AND $_POST['storey'] === "2sb" || $_POST['project'] === "rb" AND $_POST['cost'] === "3ma" AND $_POST['storey'] === "2sb"){
            header("Location: ../../cshpapplication.php?classification=compre");
        }elseif($_POST['project'] === "cb" AND $_POST['cost'] === "3mb" AND $_POST['storey'] === "2sa" || $_POST['project'] === "rb" AND $_POST['cost'] === "3mb" AND $_POST['storey'] === "2sa"){
            header("Location: ../../cshpapplication.php?classification=compre");
        }elseif($_POST['project'] === "lp"){
            header("Location: ../../cshpapplication.php?classification=lp");
        }elseif($_POST['project'] === "gp"){
            header("Location: ../../cshpapplication.php?classification=gp");
        }else{
            header("Location: ../../cshpapplication.php?classification=simpli");
        }
        */
    }else{
        header("Location: ../../applicationformA.php?error=error");
        
    }
}else{
    header("Location: ../../login.php");

}

    