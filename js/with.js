let enterNum = false;
let calUsdt,
    calAmount;
    sufBalance = false;
    minWithd = false;
let button =document.querySelector('button');
setInterval(()=>{
let error = document.querySelectorAll('.error'),
amount = document.getElementById('amount'),
usdt = document.querySelector('#usdt'),
wallet = document.getElementById('wallet'),
balance = document.getElementById('balance');

let num = amount.value;
 let  usdtVal = usdt.value;
 let balanceVal = parseInt(balance.value);
 let newAmount = parseInt(amount.value);
// console.log('parse '+balanceVal+' '+newAmount);

 



 //balance

 if(newAmount >= 100000){
    minWithd = true;
 }else{
    minWithd = false;
 }

if(balanceVal >= newAmount){
    sufBalance = true;
    error[4].style.display = 'none';
}else{
    sufBalance = false;
}

   //amount of lucky

if(onlyNumbers(num)){

if(num !== ''){
   error[0].style.display = 'none';
   amount.style.border = '';
  // console.log('you entered only numbers');
}

}else{

if(num === ''){
   error[0].style.display = 'none';
   amount.style.border = '';
 
}

if(amount.value !== ''){
  // console.log('fool');
   error[0].style.display = 'flex';
   error[5].style.display = 'none';
   amount.style.border = '3px solid red';
}
};

//amount of usdt

if(onlyUsdt(usdtVal)){

if(usdtVal !== ''){
error[1].style.display = 'none';
 usdt.style.border = '';
//  console.log('you entered only numbers');
}

}else{

if(usdtVal === ''){
error[1].style.display = 'none';
 usdt.style.border = '';

}

if(usdtVal !== ''){
 //console.log('fool');
 error[1].style.display = 'flex';
 error[5].style.display = 'none';
 usdt.style.border = '3px solid red';
}
};

//calcul
if(enterNum === false){
   if(onlyNumbers(num)){
        calUsdt = num / 10000; 
usdt.value = `${calUsdt}$`;
calAmount = amount.value;
}else{
   usdt.value = ``;   
};
}else if(enterNum === true){

if(onlyUsdt(usdtVal)){
   calAmount = usdtVal * 10000;
   amount.value = calAmount;
   calUsdt = usdt.value;
}else{
   amount.value = '';
};

}

},100);


amount.addEventListener("click",()=>{
enterNum = false;
});
usdt.addEventListener("click",()=>{
enterNum = true;

});
let error = document.querySelectorAll('.error');
   

button.addEventListener("click",()=>{
    if(sufBalance === true){
        if(minWithd === true){
       if(usdt.value !== '' && amount.value !== '' && wallet.value !== ''){
            walletNum = wallet.value;
            let xhr = new XMLHttpRequest();
            xhr.open("POST","withd.php?am="+calAmount+"&us="+calUsdt+"&wa="+walletNum,true);
            xhr.send();
            alert('sending');
            location.reload();
        }else{
            if(wallet.value === ''){
                error[2].style.display = 'flex';
                error[5].style.display = 'none';
            }else{
                error[2].style.display = 'none';
            };
    
            if(amount.value === '' && usdt.value === ''){
                error[3].style.display = 'flex';
                error[5].style.display = 'none';
            }else{
                error[3].style.display = 'none';
            }
        }
        }else{
            error[5].style.display = 'flex';
        }
        //console.log('balance = '+balance.value+' '+amount.value);
    }else{
        error[4].style.display = 'flex';
        error[5].style.display = 'none';
    }
})




function onlyNumbers(num){
return /^[0-9 .]+$/i.test(num);
};

function onlyUsdt(usdtVal){
return /^[0-9 . $]+$/i.test(usdtVal);
};
