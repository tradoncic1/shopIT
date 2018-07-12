<script>
function showSoftware(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "Softwares will be listed here";
        return;
    } else { 
        xmlhttp = new XMLHttpRequest();
        
        var url = "getsoftware.php?q=";
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
<select name="software" onchange="showSoftware(this.value)">
  <option value="">Select manufacturer:</option>
  <option value="Microsoft">Microsoft</option>
  <option value="Avast">Avast</option>
  <option value="McAfee">McAfee</option>
  </select>
</form></center>
<br>

<center><div id="txtHint"><b>Softwares will be listed here</b></div></center>

</body>