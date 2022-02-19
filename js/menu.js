const desplegar = document.querySelector('.desplegar')
const menu = document.querySelector('.menu-navegacion')

console.log(menu)
console.log(desplegar)

desplegar.addEventListener('click', ()=>{
    menu.classList.toggle("spread")
})

window.addEventListener('click',e=>{
    if(menu.classList.contains('spread')
        && e.target != menu && e.target != desplegar){
            menu.classList.toggle("spread")
    }
})