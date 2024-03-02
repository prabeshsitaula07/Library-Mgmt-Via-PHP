<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
              *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
          
            display: flex;
            height: 100vh;
            font-family: system-ui;  
            
        }
        .login{
              
              height: 370px;
              max-width: 380px;
              min-width: fit-content;
              border-radius: 12px;
              box-shadow: 0 3px 30px black;
              background-color: white;
              margin: auto;
              position: absolute;
              right: 0;
              left: 0;
              bottom: 0;
              top: 0;
 }

        .login form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: absolute;
            margin: auto;
            padding: 20px;
            right: 0;
            left: 0;
            bottom: 0;
            top: 0;

        }
        .h{
            width: 100%;
            height: 52px;
            margin: 4px;
            border-radius: 3px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 15px;
            /* border: 1px black; */
            

        }
         #log:hover{
            cursor: pointer;
            background-color: rgb(3, 0, 158);
            transition: 1s;
        }    
        
       
        #log{
            background-color: blue;
            color: white;
            font-size: 19px;
            border: 0.3px;
            font-weight: bold;
            
        }
       

        input[type="text"],
        input[type="password"]{
            border: 1px solid #ccc;
            padding: 5px;
            color: black;
        }
        :root{
    --background-color: white;
    --text-color: black; 
    --blog-color: white;
    --btn-color: #0151cc; 
}

h2{
    text-align: center;
    margin-top: 20px;
}

    </style>

</head>
<body>
    <div class="login">
        <h2>Login</h2>
        <form action="login_process.php" align="center" method="post">
            <input type="text" placeholder="Enter email or phone" name="email" class="h">
            
            <input type="password" placeholder="Password" name="password" class="h">
            
            <input type="submit" value="Log In" class="h" id="log">

        </form>
    </div>
</body>
</html>
