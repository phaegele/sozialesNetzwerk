<<<<<<< HEAD
<h1 class="formueberschrift">Wählen Sie eine Datei zum Upload aus</h1>
<form action="bildspeichern.php" method="post" enctype="multipart/form-data">  
    <input name="datei" type="file" /><br/>
    <h4 class="spezielleUeber">Zusätzliche Informationen zum Bild</h4>
    <textarea name="zusatzinfos" rows="5" cols="110">
    </textarea><br/>
    <input type="submit" value="Starte upload" class="hlink" />
</form>
=======
<h1 class="formueberschrift">Wählen Sie eine Datei zum Upload aus</h1>
<form action="bildspeichern.php" method="post" enctype="multipart/form-data" id="uploadform">  
    <label class=reg_label>Bildauswahl</label>
    <span class="pflichtmarker">*</span>
    <input name="datei" type="file" />
    <span class="fehlermeldung"></span><br/>
    <h4 class="spezielleUeber">Zusätzliche Informationen zum Bild</h4>
    <textarea name="zusatzinfos" rows="5" cols="110">
    </textarea><br/>
    <input type="submit" value="Starte upload" class="hlink" />
    <script type="text/javascript" src="lib/js/index.js"></script>
</form>
>>>>>>> 86e974af52d43cb4f66a1948df503d76dbba9e2f
