function printDiv(id){
    var restorepage= document.body.innerHTML;
    var printContent = document.getElementById(id).innerHTML;
    document.body.innerHTML= printContent;
    window.print();
    document.body.innerHTML= restorepage;

}