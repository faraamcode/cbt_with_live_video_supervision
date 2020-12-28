
const table_name = document.querySelector("#table_details");

const table_details = table_name.dataset.id;
const answer_tbl = `answer${table_details}`;

const questions = document.querySelectorAll(".question");

questions.forEach(function(question){
    question.addEventListener('click', submit_answer);
  
});

function submit_answer(e){
    if (e.target.classList.contains("btn")) {
    //     let element = e.target.parentElement.parentElement.parentElement.parentElement.firstChild.nextSibling;
    //    const q_id =  element.dataset.id
        const ans = e.target.dataset.id
        const element = e.target.parentElement.parentElement;
      

        console.log(ans, answer_tbl);
        // const selected_answer = e.target.dataset.answer;
          delete_answer(ans, answer_tbl,element);
        //   const selected_element = e.target.parentElement.parentElement;
        //   console.log(selected_element);

        //   e.target.parentElement.parentElement.parentElement.innerHTML= `<h5 class="bg-success"> CORRECT ANSWER: ${selected_answer}  </h5>`;
       

    }
   



}

function delete_answer(ans, answer_tbl, element){


    var result; 
    var xmlhttp = new XMLHttpRequest();


    xmlhttp.onreadystatechange = function(){
        if (this.readyState ==4 && this.status == 200){
            result = this.responseText

    
        }

     element.innerHTML =`<h5 class="bg-success">Option ${result}</h5>`;

         
     }

    xmlhttp.open("GET", "delete_answer.php?answer_tbl="+answer_tbl+"&ans_id="+ans, true);
    xmlhttp.send();
    


}