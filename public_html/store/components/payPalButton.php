<?php 
session_start(); 
require "../../ppi.key.php";
?>

<img width="200" height="200" atl="goods" src="../../images/store/goods.jpg" />

    <div class="counter">
      <span id="minus" class="down">-</span>
    
      <input id="quantity" type="text" value="1">
      
      <span id="plus" class="up">+</span>
    </div>

    <script src="../../js/count.js" nonce="xyz123"></script>

<script src="<?php echo "https://www.paypal.com/sdk/js?client-id=$ppId&currency=AUD"?>" nonce="xyz123" data-csp-nonce="xyz123"></script>  
<div id="paypal-button-container"></div>
<script nonce="xyz123">

paypal
  .Buttons({
    createOrder: function () {
      const formData = new FormData();
      formData.append("quantity", document.getElementById("quantity").value);
      formData.append("token","<?php echo $_SESSION["token"]?>");
      return fetch("../../create/index.php", {
        method: "post",
        body: formData,
      })
        .then(function (res) {
          return res.json();
        })
        .then(function (data) {
          return data.result.id;
        }).catch((error) => {
          console.log(error)
        });
    },
    onApprove: function (data) {
      const formData = new FormData();
      formData.append("token","<?php echo $_SESSION["token"]?>");
      formData.append("orderID", data.orderID);
      return fetch("../../capture/index.php", {
        method: "post",
        body: formData,
      })
        .then(function (res) {
          return res.json();
        })
        .then(function (details) {
          const description = details.result.purchase_units[0].description;
          const orderID = details.result.id;
          const email = details.result.payer.email_address;
          const name = details.result.purchase_units[0].shipping.name.full_name;
          let address = "";
          for (let x in details.result.purchase_units[0].shipping.address) {
            address +=
              details.result.purchase_units[0].shipping.address[x] + "<br>";
          }
          let purchase =
            details.result.purchase_units[0].items[0].quantity +
            " x " +
            details.result.purchase_units[0].items[0].name +
            " $" +
            details.result.purchase_units[0].items[0].unit_amount.value +
            "<br><br><br>Total: $" +
            details.result.purchase_units[0].amount.value;
          const output =
            "<h2>" +
            description +
            ":</h2><br><br><h3>ID:</h3><br><br>" +
            orderID +
            "<br><br><br><h3>Email:</h3><br><br>" +
            email +
            "<br><br><br><h3>Name:</h3><br><br>" +
            name +
            "<br><br><br><h3>Address:</h3><br><br>" +
            address +
            "<br><br><h3>Purchase:</h3><br><br>" +
            purchase;
            const approved = document.getElementById("approved");
            approved.innerHTML = output;
            approved.style.border = "brown";
            approved.style.borderWidth = "1px";
            approved.style.borderStyle = "solid";
        }).catch((error) => {
          console.log(error)
        });
    },
  })
  .render("#paypal-button-container");

</script>

