let showNum = document.getElementById('luckyNum'),
showNum1 = document.getElementById('luckyNum1'),
    RollerBtn = document.querySelector('button'),
    timeSet = document.querySelector('#timeSet'),
    claim = document.querySelector('.claim'),
    fieldDiv = document.querySelector('.lucky'),
    moreMenu = document.querySelector('#moreIcon'),
    iconDiv = document.querySelector('.div'),
    DivMore = document.querySelector('.byone'),
    pMore = document.querySelectorAll('#uMore');
   


//for input from php form

let randomPhp = document.querySelector('#random');


    let rand;
    let timeRun = false;
    let min,
        sec = 60;
  



//more menu
let open = false;

moreMenu.addEventListener("click",()=>{
  
    if(open === false){
        DivMore.style.display = 'flex';
        iconDiv.style.animation = "up 0.4s";
        iconDiv.style.display = 'flex';
        moreMenu.style.animation = "spin 0.4s";
        for(let i=0;i<pMore.length;i++){
            pMore[i].style.animation = 'appear 0.4s';
        }
        open = true;
    }else{
        iconDiv.style.animation = "down 0.4s";
        moreMenu.style.animation = "spin1 0.4s";
        for(let i=0;i<pMore.length;i++){
            pMore[i].style.animation = 'disappear 0.4s';
        }
        setTimeout(()=>{
            iconDiv.style.display = 'none';
            DivMore.style.display = 'none';
        },350);
       
        open = false;
    }
      
})




let roll;


//date setting

let dateFromBase = document.getElementById("dateFromBase").value,
   // hoursFromBase = document.getElementById('HoursFromBase').value,
     curDate = document.getElementById('currentDate').value;
    // curHours = document.getElementById('currentHours').value,
    // minFromBase = document.getElementById('minFromBase').value;


  
     console.log('date from  base '+dateFromBase);
    // console.log('hours from  base '+hoursFromBase);
     console.log('date from  current '+curDate);
     //console.log('hours from  base '+curHours);



     let date = new Date(dateFromBase);
     let hours = date.setHours(date.getHours()+1);
     let minTest = date.getMinutes();
 
 
 let date1 = new Date(curDate),
     curHours = date1.setHours(date1.getHours()),
     curMin = date1.getMinutes();
 
 
     console.log('Heure '+minTest+' et '+curMin);
     console.log('int '+curHours);



   if(hours > curHours){

    if(minTest > curMin){
        min = minTest - curMin;
      
        console.log('minute reste > '+min); 
        timeRun = true;
        timer();
        timeSet.style.display = 'flex';
        RollerBtn.style.display = 'none';
    }else if(minTest <= curMin){
        min = (minTest+59)-curMin;
        console.log('minute reste < '+min); 
        timeRun = true;
        timer();
        timeSet.style.display = 'flex';
        RollerBtn.style.display = 'none';
    }
    roll = true;
  
}else{
    console.log('timeout');
    timeRun = false;
    roll = false;
}

let dice = document.querySelector('#dice');

RollerBtn.addEventListener("click",()=>{
   
let go = 50;
 
if(roll === false){

    dice.src = 'icon/dice.gif';
    dice.style.transition = '0.4s';

setInterval(()=>{
if(go > 1){
showNum.style.display = 'none';
showNum1.style.display = 'block';
rand = Math.floor(Math.random() * 9000 + 1000);
showNum1.innerHTML =  rand;


go--;
//console.log(go);
}else{
    RollerBtn.style.transform = 'scale(0)';
RollerBtn.style.transition = '0.4s';
/*showNum1.style.display = 'none';
showNum.style.display = 'block';
// rand = Math.floor(Math.random() * 9000 + 1000);
showNum.innerHTML = rand;
RollerBtn.style.display = 'none';
timeSet.style.display = 'flex';
timeRun = true;
//console.log(go);*/
}



},100);

setTimeout(()=>{
    showNum1.style.display = 'none';
showNum.style.display = 'block';
// rand = Math.floor(Math.random() * 9000 + 1000);
showNum.innerHTML = rand;
RollerBtn.style.display = 'none';


claim.style.transform = 'scale(1) translate(-50%,-50%)';
claim.style.transition = '0.4s';
fieldDiv.style.overflow = 'hidden';
fieldDiv.style.filter = 'blur(3px)';





timeSet.style.display = 'flex';


    timer(min);
   console.log(timeRun);





update(rand);



},5000);

roll = true;
};


});



function timer(){
    setInterval(()=>{
    if(timeRun === true){
      

       
        if(min === 0 && sec === 0){
            sec = 0;
            RollerBtn.style.transform = 'scale(1)';
            RollerBtn.style.transition = '0.4s';
            RollerBtn.style.display = 'flex';
            timeSet.style.display = 'none';
            timeRun = false;
            location.reload();
        }else{
            sec--;
          
        }
        if(sec < 10){
            timeSet.innerHTML = `${min}:0${sec}`;
        }else if(min < 10){
            timeSet.innerHTML = `0${min}:${sec}`; 
        }else{
            timeSet.innerHTML = `${min}:${sec}`;
        }
       
       // console.log(sec);
        if(sec === 0){
            if(min > 0){
                min--;
                if(min < 10){
                    timeSet.innerHTML = `${min}:${sec}`; 
                }
                sec = 60;
            }
          
          
        }

    }
},1000);
};



function update(num){

    let wonAnnonc = document.getElementById('won');


/*
    if($randomNum < 9985){
        $wonPoints = 1000;
    }elseif($randomNum > 9985 && $randomNum < 9994){
        $wonPoints = 3000;
    }elseif($randomNum > 9993 && $randomNum < 9998){
        $wonPoints = 5000;
    }elseif($randomNum > 9997 && $randomNum < 10000){
        $wonPoints = 10000;
    }elseif($randomNum === 10000){
        $wonPoints = 20000;
    }*/
let amounts;

if(num < 9985){
amounts = 1000;
}else if(num > 9985 && num < 9994){
    amounts = 3000;
}else if(num > 9993 && num < 9998){
    amounts = 5000;
}else if(num > 9997 && num < 10000){
    amounts = 10000;
}else if(num === 10000){
    amounts = 20000;
}
wonAnnonc.innerHTML = `Your number is ${num} that is equal to ${amounts} points`;
console.log("amount est "+amounts);
let xhr = new XMLHttpRequest();
    xhr.open("POST","claimed.php?r="+amounts,true);
    xhr.send();
}






     /*let date = new Date(dateFromBase),
         hour = date.setHours(date.getMonth());
         console.log(hour);*/