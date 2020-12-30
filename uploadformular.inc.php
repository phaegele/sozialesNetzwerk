<h1 class="formueberschrift">Wählen Sie eine Datei zum Upload aus</h1>
<form action="bildspeichern.php" method="post" enctype="multipart/form-data">  
    <input name="datei" type="file" /><br/>
    <h4 class="spezielleUeber">Zusätzliche Informationen zum Bild</h4>
    <textarea name="zusatzinfos" rows="5" cols="110">
    </textarea><br/>
    <input type="submit" value="Starte upload" class="hlink" />
</form>
