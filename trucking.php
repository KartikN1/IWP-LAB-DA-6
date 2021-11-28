<?php
$error='';
    if(isset($_POST['submit'])){

        $cname=$_POST['cname'];
        $fname=$_POST['fname'];
        $mname=$_POST['mname'];
        $lname=$_POST['lname'];
        $mail=$_POST['mail'];
        $mm=$_POST['mm'];
        $dd=$_POST['dd'];
        $yy=$_POST['yy'];
        $dot=$_POST['dot'];

        $dob=$dd.$mm.$yy;
        $user=$fname.$mname.$lname;
        if(file_exists('xml/'.$user.'.xml'))$error='User already exists';
        else{

            $xml = new SimpleXMLElement("<user></user>");
            $xml->addChild('cname',$cname);
            $xml->addChild('fname',$fname);
            $xml->addChild('mname',$mname);
            $xml->addChild('date',$dob);
            $xml->addChild('lname',$lname);
            $xml->addChild('dot',$dot);
            $xml->addChild('mail',$mail);

            $xml->asXML('xml/'.$user.'.xml');
            echo "xml created";
        }      

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trucking Insurance Quote</title>
    <style>
        body{
            text-align: center;
            background-color: blanchedalmond;
        }
        fieldset{
            width: 45%;
            margin: auto;
        }
    </style>
</head>
<body>
    <h2>TRUCKING INSURANCE QUOTE REQUEST FORM</h2>
    <fieldset>
        <br>
        <?php echo $error; ?>
        <form action="" method="post">
            <label for="cname">Company Name: </label>
            <input type="text" size="60px" required placeholder="Company Name" id="cname"><br><br>
            <label for="cname">Owner: </label>
            <input type="text" size="20px" required placeholder="First Name" id="fname">
            <input type="text" size="20px" required placeholder="Middle Name" id="mname">
            <input type="text" size="20px" required placeholder="Last Name" id="lname"><br><br>
            <label for="cname">E-mail: </label>
            <input type="text" size="60px" required placeholder="E-mail" id="mail"><br><br>
            <label for="cname">D.O.B: </label>
            <input type="text" size="15px" required placeholder="Month" id="mm"> /
            <input type="text" size="15px" required placeholder="Day" id="dd"> /
            <input type="text" size="15px" required placeholder="Year" id="yy"><br><br>
            <label for="cname">DOT: </label>
            <input type="text" size="20px" required placeholder="DOT" id="dot"><br><br>

            <label for="cname">Does owner have CDL License?</label>
            <input type="checkbox" name="Yes" value="Yes"> Yes
            <input type="checkbox" name="No" value="No"> No<br><br>

            <label for="cname">Loss Payees/Lease?</label>
            <input type="checkbox" name="Yes" value="Yes"> Yes
            <input type="checkbox" name="No" value="No"> No<br><br>

            <button type="submit">Submit</button><br><br>
        </form>
    </fieldset>
</body>
</html>