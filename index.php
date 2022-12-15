<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jwt</title>
</head>
<body>
    
<form action="api/login.php" method="post">

<input type="email" name="email" placeholder="Email">
<input type="password" name="password" placeholder="Password">
<button name="lbtn" type="submit">login</button>
</form>

<hr>
or
<br>
signup 
<form action="api/register.php" method="post">
    <input type="text" name="first_name" placeholder="firstname">
    <input type="text" name="last_name" placeholder="lastname">
<input type="email" name="email" placeholder="email">
    <input type="password" name="password" placeholder="password">
    <button type="submit" name="sbtn">register</button>

</form>
</body>
</html>