require('./bootstrap');

$(document).ready(function() {

  if(document.getElementById("exportExcel")) {
    document.getElementById("exportExcel").addEventListener("click", (e) => {
      e.preventDefault();
      axios.get('/export').then(response => {
        console.log(response);
        const url = window.URL.createObjectURL(new Blob([response.data]));
        const link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', 'Mails.xlsx'); 
        document.body.appendChild(link);
        link.click();
      });
    });
  }
  
});





