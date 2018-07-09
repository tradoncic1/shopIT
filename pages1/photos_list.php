<script>
function showCam(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "Cameras will be listed here";
        return;
    } else { 
        xmlhttp = new XMLHttpRequest();
        
        var url = "getphoto.php?q=";
        xmlhttp.open("GET",url+str,true);
        xmlhttp.send();
        
        xmlhttp.onreadystatechange = function() {
            document.getElementById("txtHint").innerHTML = this.responseText;
        };
    }
        
        //document.getElementById("txtHint").innerHTML = "zasto ne radis";
}
</script>


<body>

<center><form>
<select name="cameras" onchange="showCam(this.value)">
  <option value="">Select manufacturer:</option>
  <option value="Canon">Canon</option>
  <option value="Nikon">Nikon</option>
  <option value="Leica">Leica</option>
  <option value="Fujifilm">Fujifilm</option>
  </select>
</form></center>
<br>

<center><div id="txtHint"><b>Cameras will be listed here</b></div></center>

</body>