<script>
function showPhone(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "Phones will be listed here";
        return;
    } else { 
        xmlhttp = new XMLHttpRequest();
        
        var url = "getphone.php?q=";
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
<select name="phones" onchange="showPhone(this.value)">
  <option value="">Select manufacturer:</option>
  <option value="Samsung">Samsung</option>
  <option value="Apple">Apple</option>
  <option value="Huawei">Huawei</option>
  <option value="HTC">HTC</option>
  </select>
</form></center>
<br>

<center><div id="txtHint"><b>Phones will be listed here</b></div></center>

</body>