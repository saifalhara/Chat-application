const form = document.querySelector(".typing-area");
const inputField = document.querySelector(".input_field");
const sendBtn = document.querySelector("button"); 
const chatBox = document.querySelector(".chat-box") ; 
form.onsubmit = (e)=>{
    e.preventDefault() ;
}
sendBtn.onclick= ()=>{
    let xhr = new XMLHttpRequest() ;
    xhr.open("POST" ," php/insert-caht.php" , true);
    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = "" ; 
                scrollToButtom() ; 

            }
        }
    }
    let formData = new FormData(form) ;
    xhr.send(formData) ;
}
chatBox.onmouseenter =()=>{
    chatBox.classList.add("active"); 
}
chatBox.onmouseenter =()=>{
    chatBox.classList.remove("active");
}
setInterval(()=>{
    let xhr = new XMLHttpRequest() ;
    xhr.open("POST" ," php/get-chat.php" , true);
    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response ; 
                chatBox.innerHTML = data ;  
                if(!chatBox.classList.contains("active")) 
                    {
                        scrollToButtom ;
                    }
            }
        }
    }
    let formData = new FormData(form) ;
    xhr.send(formData) ;
} , 500);

function scrollToButtom(){
    chatBox.scrollTop = chatBox.scrollHeight ; 
}