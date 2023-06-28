let myWs = {
    getData(messageFromMain){
               
        async function api() {
            try{
                const nombreTabla = messageFromMain.message;
                const url = `http://localhost/goodProyects/campuslands-db/uploads/get/${nombreTabla}`;
                const response = await fetch(url)
                const data = await response.json();
                return data;
            } catch(error){
                console.error(error);
            }
        } api().then(data =>{
            self.postMessage({info: data})
        })
    },

}
self.addEventListener("message",(e)=>{
    postMessage(myWs[`${e.data.action}`](e.data));
})
onmessage = function(e) {
    const messageFromMain = e.data;
    console.log('Mensaje recibido en el worker:', messageFromMain);
}   