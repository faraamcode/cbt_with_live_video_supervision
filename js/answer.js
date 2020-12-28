const table_name = document.querySelector("#table_details");

const table_details = table_name.dataset.id;

const questions = document.querySelectorAll(".question");
questions.forEach(function(question){
    question.addEventListener('click', submit_answer);
  
});

function submit_answer(e){
    if (e.target.classList.contains("btn")) {
        let element = e.target.parentElement.parentElement.parentElement.parentElement.firstChild.nextSibling;
       const q_id =  element.dataset.id
        const ans = e.target.dataset.id
        const selected_answer = e.target.dataset.answer;
          load_answer(q_id, ans);
          const selected_element = e.target.parentElement.parentElement;
          console.log(selected_element);

          e.target.parentElement.parentElement.parentElement.innerHTML= `<h5 class="bg-success"> CORRECT ANSWER: ${selected_answer}  </h5>`;
       

    }
   



}

function load_answer(q_id, ans){
    console.log(q_id);
    console.log(ans);

    var exam_names; 
    var xmlhttp = new XMLHttpRequest();


    xmlhttp.onreadystatechange = function(){
        if (this.readyState ==4 && this.status == 200){
            exam_names = this.responseText

    
        }

    

         
     }

    xmlhttp.open("GET", "process_answer.php?question_tbl="+table_details+"&question_id="+q_id+"&answer_id="+ans, true);
    xmlhttp.send();
    


}