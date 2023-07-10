<?php 
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        use PHPMailer\PHPMailer\SMTP;

        require "./PHPMailer/PHPMailer.php";
        require "./PHPMailer/Exception.php";
        require "./PHPMailer/SMTP.php";
        $name = "Male Fashion Inventory Store";
        $order = rand(100000,900000);
        $oemail="aabanali4545@gmail.com";
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "aneesshahzad4444@gmail.com";
        $mail->Password = "esgvupfznjowirmk";
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";
        
        $mail->isHTML(true);
        $mail->setFrom($oemail,$name);
        $mail->addAddress($oemail);
        $mail->Subject = ("Male Fashion inventory Store Invoic ID");
        $mail->Body = "<h1>Your invoice ID is $order </h1> <p>Please use this invoice id to confirm your order when you receive your parcel from our courier service partner. <br> Thanks for shopping!</p>";
        
        if($mail->send()){
            echo "<h1>MSG HAS BEEN SEND</h1>";
        }else{
            echo "<h1>MSG HAS NOT BEEN SEND</h1>";
        }
?>