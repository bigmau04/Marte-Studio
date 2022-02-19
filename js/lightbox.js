const imagenes = document.querySelectorAll('.img-galeria')
const imagendesLight = document.querySelector('.agregar-imagen')
const contenedorLight = document.querySelector('.imagen-light')
const desplegar1 = document.querySelector('.desplegar')

imagenes.forEach(imagen =>{
    imagen.addEventListener('click', ()=>{
        aparecerImagen(imagen.getAttribute('src'))
        
    })

})

contenedorLight.addEventListener('click', (e)=>{
if(e.target !== imagendesLight){
    contenedorLight.classList.toggle('show')
    imagendesLight.classList.toggle('showImage')
    desplegar1.style.opacity = '1'
}
})


const aparecerImagen = (imagen)=>{
    imagendesLight.src =imagen
    contenedorLight.classList.toggle('show')
    imagendesLight.classList.toggle('showImage')
    desplegar1.style.opacity = '0'

}