//Error Printing
var count=0;
const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.err');

    errorDisplay.innerText = message;
    inputControl.classList.add('invalid');
    inputControl.classList.remove('valid');
    
}
//Validation Correct Input
const setSuccess = (element) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.err');
   
    errorDisplay.innerText = '';
    inputControl.classList.add('valid');
    inputControl.classList.remove('invalid');
    
};

function validateInputs(id)
{
    const ele=document.getElementById(id);
    const inp=ele.value.trim();
  

    if(inp==='')
    {
        console.log("tru");
        setError(ele,"Please Enter the "+id);
        return false;
    }
    else
    {
        setSuccess(ele);
        return true;
    }
}
function validateInputVal()
{
    const inpt=document.getElementsByTagName("input");
    console.log(inpt);
    for(var i=0;i<21;i++)
    {
      if(!validateInputs(inpt[i].id))
      {
        return false;
      }

    }
    return true;
   
}