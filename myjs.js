
/*Form validation start*/
let nameNode=document.getElementById("InputCategory");
let errNode1=document.getElementById("err1");

function validate1(){
    errNode1.innerHTML="";
    let name=nameNode.value;
    let regName=new RegExp("^([a-zA-Z])*$");
    if(name===""){
        errNode1.style.color="red";
        errNode1.innerHTML="<b>This field is required</b>";
       
        return false;
    }
    else if(!regName.test(name)){
        errNode1.style.color="red";
        errNode1.innerHTML="<b>You can only use alphabet</b>";
  
        return false;
    }
    else if(name.length<2){
        errNode1.style.color="red";
        errNode1.innerHTML="<b>Type minimum 2 letters</b>";
        return false;
    }
    else
        return true;
}


/*form validation end*/



