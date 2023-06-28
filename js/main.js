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
                        nom: "Yepeto",
                        apll:"OpenIA",
                        fecha: "2023-01-15",
                        idreg: 1
                      }
                )
            };
            let data = await (await fetch("http://localhost/ApolT01-024/PruebaPDOPHPtoDB_CRUD/uploads/campers", config)).text();
            console.log(data);
        }else if(opc=="listar"){
            let config = {
                method:"GET",
                headers:{"Content-Type": "Application/json"},
            };
            let data = await (await fetch("http://localhost/ApolT01-024/PruebaPDOPHPtoDB_CRUD/uploads/campers", config)).json();
            console.log(data);
        }
    })
})