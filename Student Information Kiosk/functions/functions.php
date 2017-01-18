<?php
//validation of name
        function valid_name($name)                 
        {
            global $error_in_name;
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
            {
                $error_in_name = "Only letters and white space allowed";
                 return 0; 
            }
               
            else
                return 1;
        }

        //validation of e-mail
        function valid_email($email,$connection)                
        {
            global $error_in_email;
            $query="SELECT email FROM user_details WHERE email='$email'";
            $check_email=mysqli_query($connection,$query);
            $check=mysqli_num_rows($check_email);
            if($check==0)
            {
                if (filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    return 1;
                }
                else
                {
                    $error_in_email="E-mail format error";
                    return 0;
                }
            }
            else
            {
                $error_in_email="User already exists.";
                return 0;
            }
        }

        
        function valid_new_username($new_username,$connection)        
        {
            $query="SELECT username FROM user_details WHERE username='$new_username'";
            $check_username=mysqli_query($connection,$query);
            $check=mysqli_num_rows($check_username);
            if($check==0)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

       
        //preventing HTML and SQL Injection
        function mysql_entities_fix_string($data)
        {
            // Fix &entity\n;
            $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
            $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
            $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
            $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

            // Remove any attribute starting with "on" or xmlns
            $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

            // Remove javascript: and vbscript: protocols
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

            // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

            // Remove namespaced elements (we do not need them)
            $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

            do
            {
                // Remove really unwanted tags
                $old_data = $data;
                $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
            }
            while ($old_data !== $data);
            $data = trim($data);
            $data = stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }

        //------------------------------------------------------------------------------------------------------------------------------------------------//

        //controlling the current user attempting login
        function attempt_login($username,$hash_password,$connection)
        {
            $salt_string="@!";
            $username.=$salt_string;
            $query="SELECT username and password FROM user_details WHERE username='$username' and password='$hash_password'";
            $result = mysqli_query($connection,$query);
            $check=mysqli_num_rows($result);
            if($check==1)
                return true;
            else
            {
                return false;
            }
        }

        //------------------------------------------------------------------------------------------------------------------------------------------------//

        //to destroy current user session
         function destroySession()  
         {    
            $_SESSION=array();
            if (session_id() != "" || isset($_COOKIE[session_name()])) 
                setcookie(session_name(), '', time()-2592000, '/');
                session_destroy();  
        }

        //------------------------------------------------------------------------------------------------------------------------------------------------//

        //checking if user remained logged in
        function logged_in() 
        {
            return isset($_SESSION['username']);
        }

        //confirmation of login
        function confirm_logged_in() 
        {
            if (!logged_in())
            {
                redirect_to("login.php");
            }
        }

        //------------------------------------------------------------------------------------------------------------------------------------------------//

        //to redirect to a new location
        function redirect_to($new_location) 
        {
            header("Location: " . $new_location);
            exit; 
        }

        //------------------------------------------------------------------------------------------------------------------------------------------------//
       

        //find id of user
        function find_user_by_id($username,$connection)
        {
            $salt_string="@!";
            $username.=$salt_string;
            $_SESSION["username"]=$username;
            $query="SELECT user_id FROM user_details WHERE username='$username'";
            $result=mysqli_query($connection,$query);
            if($result)
            {
                $row=mysqli_fetch_assoc($result);
                return $row['user_id'];
            }
        }

        //find email of user
        function find_user_by_email($username,$connection)
        {
            $salt_string="@!";
            $username.=$salt_string;
            $_SESSION["username"]=$username;
            $query="SELECT email FROM user_details WHERE username='$username'";
            $result=mysqli_query($connection,$query);
            if($result)
            {
                $row=mysqli_fetch_assoc($result);
                return chop($row['email'],$salt_string);
            }
        }

        //find user by name and email
        function find_user_by_email_and_name($email,$name,$connection)
        {
            $salt_string="@!";
            $name.=$salt_string;
            $email.=$salt_string;
            $query="SELECT email and name FROM user_details WHERE email='$email' and name='$name'";
            $result=mysqli_query($connection,$query);
            if($result)
            {
                if(mysqli_num_rows($result)>=1)
                    return true;
                else
                    return false;

            }
        }

        //given an id finds respective username
        function find_username_by_id($user_id,$connection)                           
        {
            $salt_string="@!";
            $query="SELECT username FROM user_details WHERE user_id=$user_id";
            $result=mysqli_query($connection,$query);
            if($result)
            {
                $row=mysqli_fetch_assoc($result);
                return chop($row['username'],$salt_string);
            }
        }
        
        //------------------------------------------------------------------------------------------------------------------------------------------------//

  
?>