window.onload = function(){
    var lookupbtn = document.getElementById("lookup");
    lookupbtn.addEventListener('click',function(e){
        e.preventDefault();
        var lookupinput = document.getElementById("country").value;
        var httpRequest = new XMLHttpRequest();
        httpRequest.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200 && lookupinput =='') {
                document.getElementById("result").innerHTML = this.responseText;
            
          }
          if (this.readyState == 4 && this.status == 200 && lookupinput !=''){
            document.getElementById("result").innerHTML = this.responseText;
          }
        }
        httpRequest.open("GET","http://localhost/info2180-lab5/world.php?country=" + lookupinput,true);
        httpRequest.send();
    }
)}