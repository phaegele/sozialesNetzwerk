<html>
<form action="login.php" method="post">
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
	<span class="fehlermeldung"></span><br />
	<img src="captchagenerieren.php" alt="Captcha" />
	<br />
	<label class="reg_label">Captcha</label>
	<span class="pflichtmarker"> * </span>
	<input name="captcha" />
	<span class="fehlermeldung"></span><br />
	<input type="submit" value="Daten absenden" class="hlink"/>
	</form>
</html>