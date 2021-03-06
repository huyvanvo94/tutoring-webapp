<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Users</title>

    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:300);

        .container {
            width: 360px;
            padding: 8% 0 0;
            margin: auto;
        }

        .form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }
        .form input {
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 10px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .form button {
            text-transform: uppercase;
            outline: 0;
            background: #5190af;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            cursor: pointer;
        }
        .form button:hover,.form button:active,.form button:focus {
            background: #52809f;
        }
        .form .message {
            margin: 15px 0 0;
            color: #b3b3b3;
            font-size: 12px;
        }
        .form .message a {
            color: #5190af;
            text-decoration: none;
        }
        .form .register-form {
            display: none;
        }
        .container {
            position: relative;
            z-index: 1;
            max-width: 300px;
            margin: 0 auto;
        }
        .container:before, .container:after {
            content: "";
            display: block;
            clear: both;
        }
        .container .info {
            margin: 50px auto;
            text-align: center;
        }
        .container .info h1 {
            margin: 0 0 15px;
            padding: 0;
            font-size: 36px;
            font-weight: 300;
            color: #1a1a1a;
        }
        .container .info span {
            color: #4d4d4d;
            font-size: 12px;
        }
        .container .info span a {
            color: #000000;
            text-decoration: none;
        }
        .container .info span .fa {
            color: #EF3B3A;
        }

        body {
            background-color: whitesmoke;
            font-family: "Roboto", sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>


<link rel="stylesheet" type="text/css" href="common.css">
</head>
<body>

<div id="nav">
    <div id="nav-wrapper">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="news.html">News</a></li>
            <li><a href="contacts.php">Contacts</a></li>
            <li><a href="service.html">Services</a></li>
            <li><a href="login-admin.html">Secure</a> </li>
            <li><a href="user-choose.html">User</a> </li>
        </ul>
    </div>
</div>

<!-- User search form allowing search by names, email or phone numbers. -->
<div class="container">
    <form class="form" method="post" action="response/user-search-handle.php">
        <h4>Search Users</h4>
        <p>Empty form will result in fetch all users</p>
        <label>By First Name</label>
        <input class="name" type="text" name="firstName" placeholder="first name"> <br>

        <label>By Last Name</label>
        <input class="name" type="text" name="lastName" placeholder="last name"><br>

        <label>By Email</label>
        <input name="email" type="text" placeholder="example@gamil.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" /> <br>

        <label>By Home Number</label>
        <input maxlength="10" minlength="10" type="tel" name="home" pattern="[0-9]{10}" placeholder="ex: 1231231231"/> <br>

        <label>By Mobile Number</label>
        <input maxlength="10" minlength="10" type="tel" name="mobile" pattern="[0-9]{10}" placeholder="ex: 1231231231"/> <br>


        <input type="submit" name="submit" value="Submit">

    </form>
</div>
</body>
</html>