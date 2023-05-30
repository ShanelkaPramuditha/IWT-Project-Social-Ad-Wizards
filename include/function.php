<?php
        function emptyInputSignup($fname, $lname, $email, $phone, $dob, $gender, $psw, $pswRepeat){
            $result;
            if (empty($fname) || empty($lname) || empty($email) || empty($psw) || empty($pswRepeat)){
                $result = true;
            }else{
                $result = false;
            }
            return $result;
            }
?>