addEventListener("DOMContentLoaded", ()=>{
    let myfor = document.querySelector("#MyForm");

    myfor.addEventListener("submit", async(e)=>{
        e.preventDefault();
        let opc = e.submitter.dataset.accion;
        if(opc=="guardar"){
            let config = {
                method:"POST",
                headers:{"Content-Type": "Application/json"},
                body:JSON.stringify(
                    {
                        id: 1,
                        nom: "Pepito",
                        ape1: "Campus",
                        ape2: "Zona franca",
                        dni: 33333
                    }
                )
            };
            let data = await (await fetch("http://localhost/ApolT01-024/PruebaPDOPHPtoDB_CRUD/uploads/pais", config)).text();
            console.log(data);
        }else if(opc=="listar"){
            let config = {
                method:"GET",
                headers:{"Content-Type": "Application/json"},
            };
            let data = await (await fetch("http://localhost/ApolT01-024/PruebaPDOPHPtoDB_CRUD/uploads/pais", config)).json();
            console.log(data);
        }
    })
})