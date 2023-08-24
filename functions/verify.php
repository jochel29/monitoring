<?php
    // this is the login and register verification function of the login

    // below is the include code of the db config
    include '../partial/db.php';


    // here is a statement that check is POST with a name of login. If true it will run the code inside
    if(isset($_POST['login'])){
        // session start is a fucntion that prevent unwanted user to go in the other page without login
        session_start();
        // here where the dat was get from the input and save to variable
        $username = $_POST['username'];
        $password = $_POST['password'];

        // code below is preparing the query with a username checking
        $stmt = $conn->prepare('SELECT * FROM admin_account WHERE username = ?');
        //  code below bind the data parameters in the ? in query
        $stmt->bind_param("s", $username);
        // code below execute the query
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password){

                $id = $data['id'];
                $_SESSION['username']=$username;
                $_SESSION['status']=true;
                $_SESSION['id'] = $id;
                // code below redirect you to add-user page but i use ../ to return in the parent location
                header("location:../add-user.php");

            }else{
                echo "invalid";
            }
        }else{
            echo "<h2>Invalid Username or Password</h2>";
        } 
    }


    // REGISTER VERIFY FUNCTION
    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];

        $SELECT = "SELECT username FROM admin_account WHERE username ='". $username. "'";
        $INSERT = "INSERT INTO admin_account(username, email, password) values(?, ?, ?)";
        if ($password == $repassword){
            $stmt = $conn->query($SELECT);
            if ($stmt->num_rows == 0) {
                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("sss", $username, $email, $password);
                $stmt->execute();
                //echo "New records inserted successfully";
                header("location:../login.php");

            } else{

                echo "Someone already register using this library ID/Username";
            }
             $conn->close();
        } else{
            echo "Password Not Match";
        };
    }

    
?>