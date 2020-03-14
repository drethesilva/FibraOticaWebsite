<?php
session_start();
include("../PHP/DBConfig.php");
if (isset($_REQUEST['action'])) {
    if (!isset($_SESSION['idTecnico']) && !isset($_SESSION["Token"])) {
        echo 'You have to Login First';
        return;
    }
    else {
        if (Decript($_SESSION["Token"]) != "TokenAccessGranted") {
            echo 'Youre token is incorrect';
            return;
        }
    }

    switch ($_REQUEST['action']) {
        case "AddContent":
         
            

            if ((count($_FILES['InputFile']['name']) == 0 || count($_FILES['InputFile']['name']) == 1) && $_FILES['InputFile']['name'][0] == "") {
                echo"asd";
            } else {
                for ($i = 0; $i < count($_FILES['InputFile']['name']); $i++) {
                    $info = pathinfo($_FILES['InputFile']['name'][$i]);
                    $ext = $info['extension']; // get the extension of the file
                    


                    $dir = '../Files/ExcelsDeEnvio/';

                    // Sort in ascending order - this is default
                    
                    
                    
                    //$a = scandir($dir);                   
                    
                    //echo $a[0];
                    foreach(glob($dir.'/*.*') as $file) {
                       
                        //echo "<br>";
                        
                    }

                    $folderPath = '../Files/ExcelsDeEnvio/';
                    $file2 = glob($folderPath . '*');
                    $countFile = 0;
                    if ($file != false)
                    {
                        $countFile = count($file2);
                    }
                    echo $countFile;
                    $a_end = $file; 
                    
                 
                    $a_end_split = (explode("//",$a_end));
                    
                    $a_end_split = (explode(".",$a_end_split[1]));
                    
                    if($countFile<=9)
                    {
                        $a_end_split_mais_um = $a_end_split[0] + 1;
                    }
                    else
                    {
                        $a_end_split_mais_um = $a_end_split[0] + ($countFile-8);
                        
                    }
                    
                    
                    $a_end_split_mais_um = $a_end_split_mais_um.".".$ext;

                    $array[] = $a_end_split_mais_um;
                    
                  
                    //$newname = GetNumberName($db) . "." . $ext;
                   
                    $target = '../Files/ExcelsDeEnvio/' . $a_end_split_mais_um;
                    move_uploaded_file($_FILES['InputFile']['tmp_name'][$i], $target);
              
                    
                    
                }
            }
            
            header("Location: mailto:someone@example.com?Subject=Envio%20de%20Ficheiro&Body=https://localhost/MeusSites/FibraOticaWebsite/Files/ExcelsDeEnvio/$array[0]%0Ahttps://localhost/MeusSites/FibraOticaWebsite/Files/ExcelsDeEnvio/$array[1]");
            
        break;
    }

    
    

    /*function GetNumberName($db)
    {
        $dir = '../Files/ExcelsDeEnvio';

        // Sort in ascending order - this is default
        $a = scandir($dir);

        // Sort in descending order
        $b = scandir($dir,1);

        echo($a);
        echo($b);

        return 1;

        //$_SESSION['idTecnico']
      /*  $query = $db->
        $query->execute();
        $rs = $query->fetchAll(PDO::FETCH_OBJ);
        foreach ($rs as $r) {
            return $r->id + 1;
        }*/
    //}

 
}
