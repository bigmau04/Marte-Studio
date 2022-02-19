console.log("script funcionando")


setTimeout(function(){
    const elemento = document.getElementById("mywelcome");
    elemento.style.width = "5vw"
    //elemento.style.display = 'none';
},2000);

setTimeout(function(){
    const elemento = document.getElementById("mywelcome");
    //elemento.style.width = "5vw"
    elemento.style.display = 'none';
},3000);