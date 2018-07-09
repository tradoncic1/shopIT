<script>
function showTablets(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "Tablets will be listed here";
        return;
    } else { 
        xmlhttp = new XMLHttpRequest();
        
        var url = "gettablets.php?q=";
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
<select name="tablets" onchange="showTablets(this.value)">
  <option value="">Select manufacturer:</option>
  <option value="Samsung">Samsung</option>
  <option value="Apple">Apple</option>
  <option value="Prestigio">Prestigio</option>
  <option value="Xiaomi">Xiaomi</option>
  </select>
</form></center>
<br>

<center><div id="txtHint"><b>Tablets will be listed here</b></div></center>

</body>