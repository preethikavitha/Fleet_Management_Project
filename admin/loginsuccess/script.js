const email = document.getElementById("user");
const password = document.getElementById("password");
const cpassword=document.getElementById("cpassword");
const temp_pass=document.getElementById("temp_pass");


const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.err');

    errorDisplay.innerText = message;
    inputControl.classList.add('invalid');
    inputControl.classList.remove('valid');
    
}

const setSuccess = (element) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.err');

    errorDisplay.innerText = '';
    inputControl.classList.add('valid');
    inputControl.classList.remove('invalid');
    
};

const isValidEmail = (email) => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

const validateMail = () => {
    const emailValue = email.value.trim();
    

    if (emailValue === '') {
        setError(email, 'Email is required');
        return false;
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Provide a valid email address');
        return false;
    } else {
        setSuccess(email);
        return true;
       
    }
};
const temppass=() =>{
    const tempValue=temp_pass.value.trim();
    if(tempValue === '')
    {
        setError(temp_pass,'Temporary password is required');
        return false;
    }
    else
    {
       setSuccess(temp_pass);
       return true;
    }
}

const validatePassword=() => {
   
    const passwordValue = password.value.trim();
    
    if (passwordValue === '') {
        setError(password, 'Password is required');
        return false;
    } else if (passwordValue.length < 8) {
        setError(password, 'Password must be at least 8 characters.');
        return false;
    }
    else if(passwordValue.length > 15){
        setError(password,"Password must be lesser than 15 characters");
        return false;
    } else {
        setSuccess(password);
        return true;
    }

    
};

const validatePassword1=()=>{
    const cpasswordValue=cpassword.value.trim();
    const passwordValue1=password.value.trim();
    if(cpasswordValue === '')
    {
        setError(cpassword, 'Password is required');
        return false; 
    }
    else if (cpasswordValue.length < 8) {
        setError(cpassword, 'Password must be at least 8 characters.');
        return false;
    }
    else if(cpasswordValue.length > 15){
        setError(cpassword,"Password must be lesser than 15 characters");
        return false;
    } else {
        setSuccess(cpassword);
        if(passwordValue1===cpasswordValue)
    {
        setSuccess(cpassword);
        return true;
    }
    else{
        setError(cpassword,"Confirm Password doesn't matches password");
        return false;
        
    }
        
    }

  
};
const validatePasswords=()=>{
 
  const p1=temppass();
  const p2=validatePassword();
  const p3=validatePassword1();
  if(p1 && p2 && p3)
  {
    return true;
  }
  else{
    console.log("Form submission cancelled due to validation error itself");
    return false;
  }
};

const validateInputs=()=>{

    const p1=validateMail();
    const p2=validatePassword();
    if (p1 && p2) {
        return true;
    } else {
       
        return false;
    }
};
    