<h3> Contact</h3>
<form method="post" action="index.php?rq=contact_action">
	<table border="0" cellpadding="0" cellspacing="5">
		<?php
		if(empty($_SESSION['connected'])){
			echo 
			'
			<tr>
			<td align="right">
				<p class="signup">E-Mail</p>
			</td>
			<td>
				<input name="email" type="text" maxlength="100" size="25" />
				<font color="orangered" size="+1"><tt><b>*</b></tt></font>
			</td>
			</tr>';
		}else {
			$_POST['email']= $_SESSION['email'];
		}
		
		?>
		<tr>
			<td align="right">
				<p class="signup">Sujet</p>
			</td>
			<td>
				<input name="subject" type="text" maxlength="100" size="25" />
				<font color="orangered" size="+1"><tt><b>*</b></tt></font>
			</td>
		</tr>
		<tr align="right">
			<td align="right">
				<p class="signup">Message</p>
			</td>
			<td>
				<textarea name="content" cols="40" rows="5" ></textarea>
				<font color="orangered" size="+1"><tt><b>*</b></tt></font>
			</td>
		</tr>	
		<tr>
			<td>
				<input type="submit" name="send" value="Soumettre le message" />
			</td>
    	</tr>
	</table>
</form>
<font color="orangered" size="+1"><tt><b>*Ces champs ne peuvent pas être vides!</b></tt></font>