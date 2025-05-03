<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    
     <!--my code -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

<link rel="stylesheet" href="./style.css">
    <style>
/* Default styles */
.form {
  width: 100%;
  max-width: 1300px; /* Adjust the maximum width as needed */
  padding: 0 15px;
  margin: 0 auto; /* Center the form horizontally */
}

    </style>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form id="form" action="usersignup.php" method="POST" autocomplete="off">
                    <h2 class="text-center" style="color:black ">Signup Form</h2>
                    <p class="text-center" style="color:black">It's quick and easy.</p>
       <div class="form-group">
                       <input class="form-control" id="name" type="text" name="Name"  placeholder="Full Name">
                       <div class="error"></div>
                    </div>
                    <div class="form-group">
                    <input class="form-control" id="email" type="email" name="Email"  placeholder="Email Address">
                        <div class="error"></div>
                  </div>
                    <div class="form-group">
                        <input class="form-control" id="phone" type="tel" name="Phno" placeholder="Phone Number">
                        <div class="error"></div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="password" type="password" name="Password" placeholder="Password">
                        <div class="error"></div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="password1" type="password" name="Cpassword" placeholder="Confirm password">
                        <div class="error"></div>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signup" value="Signup" onclick="return validateInputs();">
                    </div>
                    <div class="link login-link text-center" style="color:black">Already a member? <a href="login.php" style="color:#f88501; text-decoration:none"><p>Login here</p></a></div>
                </form>
            </div>
        </div>
        <script>
      const name = document.getElementById("name");
        const email = document.getElementById("email");
        const phone = document.getElementById("phone");
        const password = document.getElementById("password");
        const password1 = document.getElementById("password1");
        var count=0;
       // form.addEventListener('submit', e => {
   // e.preventDefault();

   // validateInputs();
//});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('invalid');
    inputControl.classList.remove('valid');
    count=1;
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('valid');
    inputControl.classList.remove('invalid');
  
};
const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
const isValidPhone= phone => {
        const re = /^(\d{3})[- ]?(\d{3})[- ]?(\d{4})$/
        return re.test(phone);
      }
const validateInputs = () => {
    const usernameValue = name.value.trim();
    const emailValue = email.value.trim();
    const phoneValue=phone.value.trim();
    const passwordValue = password.value.trim();
    const password2Value = password1.value.trim();

    if(usernameValue === '') {
        setError(name, 'Username is required');
    } else {
        setSuccess(name);
    }

    if(emailValue === '') {
        setError(email, 'Email is required');
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Provide a valid email address');
    } else {
        setSuccess(email);
    }
    if(phoneValue === '')
    {
         setError(phone, 'Mobile Number is Required');
    }
    else if(!isValidPhone(phoneValue)){
        setError(phone, 'Provide a valid Mobile Number');
    } else {
        setSuccess(phone);
    }
    

    if(passwordValue === '') {
        setError(password, 'Password is required');
    } else if (passwordValue.length < 8 ) {
        setError(password, 'Password must be at least 8 character.')
    } else {
        setSuccess(password);
    }
    if(password2Value === '') {
        setError(password1, 'Please confirm your password');
    } else if (password2Value !== passwordValue) {
        setError(password1, "Passwords doesn't match");
    } else {
        setSuccess(password1);
    }
if(count==1)
{ 
    count=0;
    return false;
}
else{
    return true;
}
};

		
    </script>
    </body>
</html>

  
