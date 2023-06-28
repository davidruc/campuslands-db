export default function handleSelectChange() {
    const selectElement = document.getElementById('mySelect');
    const selectedValue = selectElement.value;
    const method = "print"
    const namefunction = method + selectedValue;
  
    const methods = {
      [namefunction]() {
        const ws = new Worker("./storage/myWs.js", {type:"module"});
        ws.postMessage({action:"getData", message: selectedValue});
        ws.addEventListener("message",(e)=>{
            const array = e.data.info.Message; 
            console.log(array);


            const table = document.createElement('table');
            table.classList.add('table', 'table-dark', 'table-hover');

            const thead = document.createElement('thead');
            thead.classList.add('table-dark');

            const tbody = document.createElement('tbody');

            // Generar los encabezados
            const thRow = document.createElement('tr');
            Object.keys(array[0]).forEach((key) => {
            const th = document.createElement('th');
            th.setAttribute('scope', 'col');
            th.textContent = key;
            thRow.appendChild(th);
            });
            thRow.innerHTML += '<th>Acciones</th>'; // Agregar columna "Acciones"
            thead.appendChild(thRow);

            // Generar las filas con los datos
            array.forEach((item) => {
            const tr = document.createElement('tr');
            Object.values(item).forEach((value) => {
                const td = document.createElement('td');
                td.textContent = value;
                tr.appendChild(td);
            });

            // Agregar botones "x" y "+"
            const actionsTd = document.createElement('td');
            const identificador = item.identificador; // Obtener el valor del primer campo (identificador)
            actionsTd.innerHTML = `
                <button id="delete-button-${identificador}" class="btn btn-danger">x</button>
                <button id="add-button-${identificador}" class="btn btn-warning">+</button>
            `;
            tr.appendChild(actionsTd);

            tbody.appendChild(tr);
            });

            table.appendChild(thead);
            table.appendChild(tbody);

            document.querySelector("#here").innerHTML = '';
            document.querySelector("#here").appendChild(table);
                        
                
               
                
            
        })


  
    }
}
methods[namefunction]();

}