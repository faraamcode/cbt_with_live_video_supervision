const activateBtn =document.querySelector("#activate");
const deactivateBtn =document.querySelector("#deactivate");
const statusBtn =document.querySelector("#status");

activateBtn.addEventListener("click", ()=>{ 
    activateFxn("activated")});

deactivateBtn.addEventListener("click", ()=>{ 
    activateFxn("deactivated")});

const exam = activateBtn.dataset.exam;
const cat = activateBtn.dataset.cat;

function activateFxn(value){
   

        var result; 
    var xmlhttp = new XMLHttpRequest();


    xmlhttp.onreadystatechange = function(){
        if (this.readyState ==4 && this.status == 200){
            result = this.responseText

    
        }

    
  statusBtn.textContent = `Staus: ${result}`;
         
     }

    xmlhttp.open("GET", "activate.php?exam="+exam+"&cat="+cat+"&updatevalue="+value, true);
    xmlhttp.send();
    
  
}

