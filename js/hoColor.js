let body = document.querySelector('body'),
    allDiv = document.querySelector('.all'),
    footer = document.querySelector('.footer'),
    h1 = document.querySelectorAll('h1'),
    menuDiv = document.querySelector('.menu'),
    p = document.querySelectorAll('p'),
    pMo = document.querySelectorAll('#uMore'),
    iconMore = document.querySelector('.icon'),
    btn = document.querySelector('button'),
    whiteDiv = document.querySelector('.white'),
    blackDiv = document.querySelector('.black'),
    username = document.querySelector('#use'),
    theme = document.querySelector('#theme'),
    FooterMenu = document.querySelectorAll('.foot'),
    ClaimDiv = document.querySelector('.claim'),
    orangeDiv = document.querySelector('.orange');

    let color = theme.value;
   // console.log(color);


  
    if(color === 'black'){
        body.style.backgroundColor = '#020414';
        allDiv.style.backgroundColor = '#060a27';
        footer.style.backgroundColor = '#020414';
        menuDiv.style.backgroundColor = '#020414';
        ClaimDiv.style.backgroundColor = '#020414';
        for(let i=0;i<h1.length;i++){
            h1[i].style.color = 'aliceblue';
        };
        for(let j=0;j<p.length;j++){
            p[j].style.color = 'aliceblue';
        };
       // blackDiv.style.border = '5px solid #0029ff';
   for(let k=0;k<pMo.length;k++){
            pMo[k].style.backgroundColor = 'aliceblue';
            pMo[k].style.color = "#060a27";
        };
        iconMore.style.backgroundColor = '#5c6565';
        btn.style.backgroundColor = '#a3cef3';

    }else if(color === 'white'){
        body.style.backgroundColor = 'aliceblue';
        allDiv.style.backgroundColor = 'aliceblue';
        footer.style.backgroundColor = '#a3cef3';
        menuDiv.style.backgroundColor = '#a3cef3';
        for(let i=0;i<h1.length;i++){
            h1[i].style.color = 'rgb(0 0 0 / 81%)';
        };
        for(let j=0;j<p.length;j++){
            p[j].style.color = 'rgb(0 0 0 / 81%)';
        };
       // whiteDiv.style.border = '5px solid #0029ff';
   for(let k=0;k<pMo.length;k++){
            pMo[k].style.backgroundColor = '#a3cef3';
            pMo[k].style.color = "rgb(0 0 0 / 81%)";
        };
        iconMore.style.backgroundColor = '#a3cef3';
        btn.style.backgroundColor = '#a3cef3';
    }else if(color === 'orange'){


        body.style.backgroundColor = '#ff3c00';
        allDiv.style.backgroundColor = 'aliceblue';
        footer.style.backgroundColor = '#ff3c00';
        menuDiv.style.backgroundColor = '#ff3c00';
        for(let i=0;i<h1.length;i++){
            h1[i].style.color = '#5d6165';
        };
        for(let j=0;j<p.length;j++){
            p[j].style.color = 'rgb(0 0 0 / 81%)';
        };
   for(let k=0;k<pMo.length;k++){
            pMo[k].style.backgroundColor = '#ff3c00';
            pMo[k].style.color = "aliceblue";
        };
        iconMore.style.backgroundColor = '#ff3c00';
       username.style.color = 'rgba(0, 0, 0, 0.81)';
       for(let f=0;f<FooterMenu.length;f++){
        FooterMenu.style.color = 'aliceblue';
       }
        console.log('back to default');
       // orangeDiv.style.border = '5px solid #0029ff';
        btn.style.backgroundColor = '#ff3c00';
    };
   /* orangeDiv.addEventListener("click",()=>{
        color = 'orange';
        //alert('orange');
        blackDiv.style.border = '';
       whiteDiv.style.border = '';
    });
    blackDiv.addEventListener("click",()=>{
        color = 'black';
       // alert('black');
       // orangeDiv.style.border = '';
        whiteDiv.style.border = '';
    });
    whiteDiv.addEventListener("click",()=>{
        color = 'white';
      //  alert('white');
       // orangeDiv.style.border = '';
        blackDiv.style.border = '';
    });*/