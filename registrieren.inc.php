<html>
<form action="registrieren.php" method="post">
<!-- Name -->
	<label class="reg_label">Name</label>
	<span class="pflichtmarker">*</span>
	<input name="name" maxlength="30"
	<?php 
	if (isset($_POST['name']))echo "value='" . $_POST['name'] . "'";
	?>
	/>
	<span class="fehlermeldung"></span>
	<br />
<!-- vorname -->
	<label class="reg_label">Vorname</label>
	<span class="pflichtmarker"> * </span>
	<input name="vorname" maxlength="30"
	<?php
	if (isset($_POST['vorname']))echo "value='" . $_POST['vorname'] . "'";
	?>
	/>
	<span class="fehlermeldung"></span>
	<br />
<!-- email -->
	<label class="reg_label">E-Mail</label>
	<span class="pflichtmarker"> * </span>
	<input name="email" maxlength="30"
	<?php
	if (isset($_POST['email']))echo "value='" . $_POST['email'] . "'";
	?>
	/>
	<span class="fehlermeldung"></span>
	<br />
<!-- userid -->
	<label class="reg_label">Userid</label>
	<span class="pflichtmarker"> * </span>
	<input name="userid" maxlength="20"
    <?php
	if (isset($_POST['userid']))echo "value='" . $_POST['userid'] . "'";
	?>	
	/>
	<span class="fehlermeldung"></span>
	<br />
<!-- PW -->
	<label class="reg_label">Passwort</label>
	<span class="pflichtmarker"> * </span>
	<input name="pw" type="password" maxlength="50"
	<?php
	if (isset($_POST['pw']))echo "value='" . $_POST['pw'] . "'";
	?>
	/>
	<span class="fehlermeldung"></span>
	<br />
<!-- zusatzinfos -->
	<label class="reg_label">Zusatzinfos</label>
	<span class="pflichtmarker"> </span>
	<textarea name="zusatzinfos" rows="5" cols="30">
<?php
if (isset($_POST['zusatzinfos'])){echo $_POST['zusatzinfos'];}
?></textarea>
	<span class="fehlermeldung"></span>
	<br />
	<input type="submit" />
	</form>
</html>