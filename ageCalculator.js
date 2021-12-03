function calculateAge() 
{
    var dob = document.getElementById("Date").value;   
    var date= new Date(dob);
	var now  = new Date(Date.now());
    var diff = Math.abs(now - date );
    var age = Math.floor(diff / (1000 * 60 * 60 * 24 * 365));
    if (age<18 || age>60){
        document.getElementById("err_age").innerHTML = "you are not eligible to donate blood";
        document.getElementById("err_age").style.display = "block";
    }
    else{
        document.getElementById('age').value = age;
        document.getElementById("err_age").style.display = "none";
    }
      

}

