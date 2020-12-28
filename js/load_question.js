const cat_name = document.querySelector(".cat");
const exam_name = document.querySelector(".exam");
const exam_id = exam_name.dataset.id;
const cat_id = cat_name.dataset.id;
const question_set = document.querySelector("#question_set");
const url =`https://roemichsschools.online/entrance/process_question_set.php?cat_id=${cat_id}&exam_id=${exam_id}`;
var result;

function response(){
    const xhr = new XMLHttpRequest();
    xhr.open('GET', url);
    xhr.send();
    xhr.onreadystatechange = function(){
        if (this.readyState ==4 && this.status == 200){
          result   = this.responseText

    
        }
       question_set.textContent =`YOU HAVE SET   ${result} QUESTIONS`; 
    }
}

window.addEventListener('DOMContentLoaded', ()=>{
    response(url);
  
});