<script>
function showConsoles(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "Consoles will be listed here";
        return;
    } else { 
        xmlhttp = new XMLHttpRequest();
        
        var url = "getconsoles.php?q=";
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
<select name="consoles" onchange="showConsoles(this.value)">
  <option value="">Select manufacturer:</option>
  <option value="Sony">Sony</option>
  <option value="Microsoft">Microsoft</option>
  <option value="Nintendo">Nintendo</option>
  </select>
</form></center>
<br>

<center><div id="txtHint"><b>Consoles will be listed here</b></div></center>

</body>