<?php include_once  './config/helpers.php';?>
<form class="form">
<input type="hidden" name="token" value="<?php htmlout($token); ?>" />
<label id="hidden" for="hide">Token</label>
<input type="hidden" name="mail" id="hide" value="<?php htmlout($_GET["token"]) ?>" readonly />
<label for="user">User</label>
<input type="text" id="user" name="user" autocomplete="on" />
<label for="pass">Password</label>
<input type="password" id="pass" name="pass" autocomplete="on" />
<input type="submit" id="submit" class="captchaD" value="Login" />
</form>
<script src="../js/logSubmit.js" nonce="xyz123"></script>
<script src="../js/signSubmit.js" nonce="xyz123"></script>
<script src="../js/toggle.js" nonce="xyz123" ></script>


