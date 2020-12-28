// selecting cat_name input using its id

const  cat_name = document.querySelector("#cat_name");
const  exam_select = document.querySelector("#exam_name");

cat_name.addEventListener('change', load);
 var exam_names;
// function  load to use categories name to get exam name from database
function load(){
    const name = cat_name.value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if (this.readyState ==4 && this.status == 200){
            exam_names = this.responseText

    
        }

        var str = exam_names.slice(1, exam_names.length-1)
        var arr = JSON.parse("[" + str + "]");
    
        var name_option = arr.map(function(item){
            return `<option value="${item}">${item}</OPTION>`
        });
        
        exam_select.innerHTML = name_option;
         console.log(name_option);

         
     }
    xmlhttp.open("GET", "process.php?name="+name, true);
    xmlhttp.send();
    


    // 

    //  votingContainer.remove();
    }

