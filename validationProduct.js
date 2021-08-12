
/*Form validation start*/
let nameNode=document.getElementById("nameProduct");
let errNode1=document.getElementById("err1");

function validate1(){
    errNode1.innerHTML="";
    let name=nameNode.value;
    let regName=new RegExp("^[a-zA-Z0-9]+$");
    if(name===""){
        errNode1.style.color="red";
        errNode1.innerHTML="<b>This field is required</b>";
       
        return false;
    }
    else if(!regName.test(name)){
        errNode1.style.color="red";
        errNode1.innerHTML="<b>You can only use alphabets</b>";
  
        return false;
    }
        else
        return true;
}

let priceNode=document.getElementById('priceProduct');
let errNode2=document.getElementById("err2");

function validate2(){
    errNode2.innerHTML="";
    let price=priceNode.value;
    let regName=new RegExp("^[+-]?([0-9]+\.?[0-9]*|\.[0-9]+)$");
    if(price===""){
        errNode2.style.color="red";
        errNode2.innerHTML="<b>This field is required</b>";
        return false;
    }
    else if(!regName.test(price)){
        errNode2.style.color="red";
        errNode2.innerHTML="<b>Invalid</b>";
        return false;
    }
    else
       return true;
}

function validateForm(){
 let st1 = validate1();
 let st2 = validate2();
 return (st1 && st2);
}
/*form validation end*/



