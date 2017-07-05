<?php

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Reikalingas vardas ";
} else {
    $name = $_POST["name"];
}

// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Žinutė negali būti tuščia ";
} else {
    $message = $_POST["message"];
}

//variables must 
//-----Use camelCase or under_score for variables
//define constants at the top of the file
$EmailTo = "gmaciuta@gmail.com";
$Subject = "Gauta nauja žinutė";
$emailas = "kazkoksemailas@siusti.com";


// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$emailas);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Kažkas blogai :(";
    } else {
        echo $errorMSG;
        //remove whitespaces
    }
}

?>
