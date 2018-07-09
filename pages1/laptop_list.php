<script>
function showLaptops(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "Laptops will be listed here";
        return;
    } else { 
        xmlhttp = new XMLHttpRequest();
        
        var url = "getlaptops.php?q=";
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
<select name="laptops" onchange="showLaptops(this.value)">
  <option value="">Select manufacturer:</option>
  <option value="Dell">Dell</option>
  <option value="Alienware">Alienware</option>
  <option value="Asus">ASUS</option>
  <option value="Acer">Acer</option>
  <option value="Toshiba">Toshiba</option>
  </select>
</form></center>
<br>

<center><div id="txtHint"><b>Laptops will be listed here</b></div></center>

</body>