let button = document.querySelector('button'),
    label = document.querySelector('label'),
    wait = document.querySelector('#wait');

button.addEventListener("click",()=>{
    label.style.display = 'none';
    wait.style.display = 'block';
    wait.style.animation = 'wait 2s linear infinite';
    button.click();
});