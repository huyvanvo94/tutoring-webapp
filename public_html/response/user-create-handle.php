
<!DOCTYPE html>
<html>
<head>
    <title>Place Autocomplete Address Form</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:300);

        .form-container {
            width: 50%;
            margin: auto;
        }

        .form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 50%;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }
        .form input, select {
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

        body {
            background-color: whitesmoke;
            font-family: "Roboto", sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .name{
            text-transform: capitalize;
        }
    </style>
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <style>

        @import url(https://fonts.googleapis.com/css?family=Roboto:300);
        *, *:before, *:after {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            font-family: "Roboto", sans-serif;
            color: #384047;
            background-color: #e8eeef;
        }


    </style>
    <link rel="stylesheet" type="text/css" href="../common.css">
</head>


<body>

<div id="nav">
    <div id="nav-wrapper">
        <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="../about.html">About</a></li>
            <li><a href="../news.html">News</a></li>
            <li><a href="../contacts.php">Contacts</a></li>
            <li><a href="../service.html">Services</a></li>
            <li><a href="../login-admin.html">Secure</a> </li>
            <li><a href="../user-choose.html">User</a> </li>
        </ul>
    </div>
</div>


<div class="form-container" >

    <form onsubmit="return validate();" class="form" method="post" action="user-create-handle.php">

        <?php
        /**
         * Handle users creation into DB
         */

        define('ROOTPATH', __DIR__);
        include  '../../settings.php';
        include('../src/database.php');
        include 'util.php';


        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if($_POST['submit'] == 'Submit'){
                try{

                    // get user
                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $email = $_POST['email'];

                    // get address
                    $zip = $_POST['zip'];
                    $street = $_POST['street_number'].' '.$_POST['address'];
                    $city = $_POST['city'];
                    $state = $_POST['state'];
                    // get phone number
                    $mobile = $_POST['mobile'];
                    $home = $_POST['home'];
                    $country = $_POST['country'];


                    $dbConn = new DbConnect($settings);
                    $user = new User($dbConn);

                    $firstName = ucfirst(strtolower($firstName));
                    $lastName = ucfirst(strtolower($lastName));


                    $result = $user->insertUser($firstName, $lastName, $email, $home, $mobile, $zip, $street, $city, $state, $country);

                    if($result)
                        echo "<p style='text-align: center'>Success!</p>";
                    else{

                          echo "<p style='text-align: center'>Could not add. Email and mobile number number be unique</p>";
                    }

                }catch (PDOException $e){

                    echo "<p style='text-align: center'>Error!</p>";
                }
            }
        }

        ?>
        <h1>New User</h1>
        <label>First Name</label>
        <input pattern="[^' ']+" class="name" type="text" name="firstName" placeholder="first name"  required> <br>
        <label>Last Name</label>

        <input pattern="[^' ']+" class="name" type="text" name="lastName" placeholder="last name" required><br>
        <label>Email Address</label>       <input type="text" name="email" placeholder="example@gamil.com" pattern="^.+@.+\..{2,4}$"  required><br>

        <label>Mobile Phone Number</label>
        <input maxlength="10" minlength="10" type="tel" name="mobile" pattern="[0-9]{10}" placeholder="ex: 1231231231" required><br>

        <label>Home Phone Number</label>
        <input maxlength="10" minlength="10" type="tel" name="home" pattern="[0-9]{10}" placeholder="ex: 1231231231" required><br>

        <label>Enter your address here (Power by Google)</label>

        <div id="locationField">
            <input id="autocomplete" placeholder="Enter your address here!"
                   onFocus="geolocate()" type="text">
        </div>


        <input pattern="[0-9]*" type="tel" class="field" id="street_number" name="street_number" placeholder="street number" required>

        <input pattern="^[^0-9]*" class="field" id="route" name="address" placeholder="address" required>

        <input pattern= "[0-9]*" minlength="5" maxlength="5" type="tel" name="zip" placeholder="zip code" id="postal_code"  required><br>

        <input pattern="^[^0-9]*" type="text" name="city"  placeholder="city" id="locality" required><br>

        <input pattern="^[^0-9]*" type="text" id="administrative_area_level_1"  placeholder="state" name="state" required>

        <input pattern="^[^0-9]*" type="text" id="country" name="country" placeholder="country" required>

        <input type="submit" name="submit" value="Submit">
    </form>
</div>




<script>
    // This example displays an address form, using the autocomplete feature
    // of the Google Places API to help users fill in the information.

    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    var placeSearch, autocomplete;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

    function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }
    }

    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }

    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1e-Yda1SUwoYAv8RhI-UFT_aH5YxI8ck
&libraries=places&callback=initAutocomplete"
        async defer></script>

<script>

    function hasNumber(myString) {
        return /\d/.test(myString);
    }


    function validate() {
        var firstName = document.getElementsByName("firstName")[0].value;

        if(!firstName.match(/^([^0-9]*)$/)){
            alert("Name can only contain letters");
            return false;
        }

        var lastName = document.getElementsByName("lastName")[0].value;

        if(!lastName.match(/^([^0-9]*)$/)){
            alert("Name can only contain letters");
            return false;
        }

        var email = document.getElementsByName("email")[0].value;

        if (!email.match(/^.+@.+\..{2,4}$/)) {
            alert("Email should match the pattern: name@domain.com");
            return false;
        }

        var streetNumber = document.getElementById("street_number");
        if(!streetNumber.match(/^[0-9]*$/)){
            alert("Street must contains numbers only");
            return false;
        }

        var zip = document.getElementById("zip");
        if(!zip.match(/^[0-9]*$/)){
            alert("Zip must contains numbers only");
            return false;
        }

        var street = document.getElementById("route");

        if(hasNumber(street)){
            alert("Address must only contains letters");
            return false;
        }

        var state = document.getElementById("administrative_area_level_1");

        if(hasNumber(state)){
            alert("States cannot contains numbers");
            return false;
        }

        return true;
    }
</script>
</body>
</html>

