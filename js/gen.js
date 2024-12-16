let inputGen = document.querySelector('.iduser');

let str = 'ABCDEFJHIJKLMNOPKRSTUVWXYZ123456789';

    let Rand = '';
    for(let i =0;i<5;i++){
     Rand += str.charAt(Math.floor(Math.random()*str.length));
    
    }
    console.log(Rand +' '+str.length);
    inputGen.value = Rand;