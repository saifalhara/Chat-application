const paswrdFiled = document.querySelector(".form  input[type='password']");
const toggleBtn = document.querySelector(".form .field i");
toggleBtn.onclick = ()=>{
    if(paswrdFiled.type == "password"){
        paswrdFiled.type = "text" ;
        toggleBtn.classList.add("active") ;
    }
    else{
        paswrdFiled.type = "password" ;
        toggleBtn.classList.remove("active");  
    }
}