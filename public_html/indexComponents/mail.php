<?php include_once  './config/helpers.php';?>
<form id="mailForm">
    <input type="hidden" name="token" value="<?php htmlout($token); ?>" />
    <label for="email">Email token</label>
    <input type="email" id="email" name="email" />
    <input id="submitmail" class="captchaD" type="submit" value="Send" />
</form>
<script src="../js/mail.js" nonce="xyz123" > </script>