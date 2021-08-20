<form class="form">
<input type="hidden" name="iv" value="<?php echo $iv; ?>" />
<input type="hidden" name="key" value="<?php echo $key; ?>" />
<input type="hidden" name="token" value="<?php echo $token; ?>" />
<label id="hidden" for="hide">Token</label>
<input type="hidden" name="mail" id="hide" value="<?php echo $_GET["token"] ?>" disabled />
<label for="user">User</label>
<input type="text" id="user" name="user" />
<label for="pass">Password</label>
<input type="password" id="pass" name="pass" />
<input type="submit" id="submit" class="captchaD" value="Login" />
</form>
<script src="../js/crypto-js.min.js" nonce="xyz123"></script>
<script src="../js/logSubmit.js" nonce="xyz123"></script>
<script src="../js/signSubmit.js" nonce="xyz123"></script>
<script src="../js/toggle.js" nonce="xyz123" ></script>


