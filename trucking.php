<?php
$error='';
    if(isset($_POST['submit'])){

        $cname=$_POST['cname'];
        $cdl=$_POST['cdl'];
        $losspay=$_POST['losspay'];
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
            $xml->addChild('cdl',$cdl);
            $xml->addChild('losspay',$losspay);
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
            <label >Company Name: </label>
            <input type="text" size="60px" required placeholder="Company Name" name="cname"><br><br>
            <label >Owner: </label>
            <input type="text" size="20px" required placeholder="First Name" name="fname">
            <input type="text" size="20px" required placeholder="Middle Name" name="mname">
            <input type="text" size="20px" required placeholder="Last Name" name="lname"><br><br>
            <label >E-mail: </label>
            <input type="text" size="60px" required placeholder="E-mail" name="mail"><br><br>
            <label >D.O.B: </label>
            <input type="text" size="15px" required placeholder="Month" name="mm"> /
            <input type="text" size="15px" required placeholder="Day" name="dd"> /
            <input type="text" size="15px" required placeholder="Year" name="yy"><br><br>
            <label >DOT: </label>
            <input type="text" size="20px" required placeholder="DOT" name="dot"><br><br>

            <label >Does owner have CDL License?</label>
            <input type="radio" id="Yes" name="cdl" value="yes">
            <label for="yes">yes</label>
            <input type="radio" id="no" name="cdl" value="no">
            <label for="no">no</label><br><br>

            <label >Loss Payees/Lease?</label>
            <input type="radio" id="Yes" name="losspay" value="yes">
            <label for="yes">yes</label>
            <input type="radio" id="no" name="losspay" value="no">
            <label for="no">no</label><br><br>

            <button type="submit" name="submit">Submit</button><br><br>
        </form>
    </fieldset>
</body>
</html>