
const question_element = document.querySelector(".qtn-tbl");
const  question_tbl = question_element.dataset.id;
const answer_tbl = `answer${question_tbl}`;
const question_update = document.querySelector(".question-update");
const  option_updates = document.querySelectorAll(".option-container"); 

question_update.addEventListener('click', function(e){
    if (e.target.classList.contains("btn-qtn")) {
      const id = e.target.dataset.id;
      const elements =  e.target.previousSibling.previousSibling.firstChild.nextSibling;
   const question = elements.value;
   const button = e.target;
      update_question(question, question_tbl, id, button);
        
    }
})

option_updates.forEach(function(option_update){
    option_update.addEventListener('click', function(e){
        if (e.target.classList.contains("btn-answer")) {
        const button = e.target;
          const id = e.target.dataset.id;
          const elements =  e.target.previousSibling.previousSibling.firstChild.nextSibling;
       const answer = elements.value;
      
       update_answer(answer, answer_tbl, id, button);

        }
    });
});









function update_answer(answer, answer_tbl, answer_id, button){


    var result; 
    var xmlhttp = new XMLHttpRequest();


    xmlhttp.onreadystatechange = function(){
        if (this.readyState ==4 && this.status == 200){
            result = this.responseText

    
        }

     button.textContent = result;
     button.classList.remove("btn-danger");
     button.classList.add("btn-success")

         
     }

    xmlhttp.open("GET", "update_answer.php?answer_tbl="+answer_tbl+"&ans_id="+answer_id+"&answer="+answer, true);
    xmlhttp.send();
    


}

function update_question(question, question_tbl, question_id, button){


    var result; 
    var xmlhttp = new XMLHttpRequest();


    xmlhttp.onreadystatechange = function(){
        if (this.readyState ==4 && this.status == 200){
            result = this.responseText

    
        }

     button.textContent = result;
     button.classList.remove("btn-danger");
     button.classList.add("btn-success")

         
     }

    xmlhttp.open("GET", "update_question.php?question_tbl="+question_tbl+"&question_id="+question_id+"&question="+question, true);
    xmlhttp.send();
    


}