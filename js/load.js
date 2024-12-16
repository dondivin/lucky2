let loading = document.querySelector('.motLoad');

window.addEventListener("load",()=>{
    setTimeout(()=>{
        loading.style.display = 'none';
    },1000);
   
})