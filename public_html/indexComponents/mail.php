<?php include_once  './config/helpers.php';?>
<form id="mailForm">
<label for="mail">Email token</label>
    <input type="hidden" name="token" value="<?php htmlout($token); ?>" />
    <input type="email" id="mail" name="mail" />
    <input id="submitmail" class="captchaD" type="submit" value="Send" />
</form>
<script src="../js/mail.js" nonce="xyz123" > </script>