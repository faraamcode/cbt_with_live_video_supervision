let index = 1;
const question_n = document.querySelector("#question_no");
const question_number= parseInt(question_n.value);
console.log(question_number);

const questions = document.querySelectorAll(".question-id");

const question_no = document.querySelector(".btn-container");
const prevBtn = document.querySelector(".prev-btn");
const nextBtn = document.querySelector(".next-btn");

question_no.addEventListener('click', function(e){
	if (e.target.classList.contains("btn-number")) {
	const	id = parseInt(e.target.dataset.id);
	   index = id;
		 display(id);
	}
});

prevBtn.addEventListener('click', function(){
   index--;
   if(index<=0){
       index =question_number;
       
   }
   display(index);
});

nextBtn.addEventListener('click', function(){
   index++;
   if(index > question_number ){
       index = 1;
       
   }
   display(index);
});

window.addEventListener('DOMContentLoaded', ()=>{
    index= 1;
    display(index);
})

function display(id) {


	questions.forEach((question)=>{

	const questId = parseInt(question.dataset.id);

if (id===questId) {

question.classList.remove("hide");
	
 }else{
 	question.classList.add("hide");
 }
//  console.log(question);
});

}
const questionAndAnswers = document.querySelector(".section-question");
const btn_numbers = document.querySelectorAll(".btn-number");

questionAndAnswers.addEventListener("click", function(e) {
if (e.target.classList.contains("option")) {
    const id = e.target.dataset.id;
    btn_numbers.forEach((btn)=>{
        if(btn.dataset.id===id){
            btn.classList.add("answered");

        }
    })
    
}    
})

