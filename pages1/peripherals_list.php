<script>
function showPeriph(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "Peripherals will be listed here";
        return;
    } else { 
        xmlhttp = new XMLHttpRequest();
        
        var url = "getperipherals.php?q=";
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
<select name="periphs" onchange="showPeriph(this.value)">
  <option value="">Select manufacturer:</option>
  <option value="Razer">Razer</option>
  <option value="Logitech">Logitech</option>
  <option value="SteelSeries">SteelSeries</option>
  <option value="Corsair">Corsair</option>
  </select>
</form></center>
<br>

<center><div id="txtHint"><b>Peripherals will be listed here</b></div></center>

</body>