const sub = document.getElementsByClassName("captchaD")[0];
const sub1 = document.getElementsByClassName("captchaD")[1];
const cap = document.getElementById("resCaptcha");
cap.innerHTML = "Please enter captcha";
sub.disabled = true;
sub1.disabled = true;
function captcha(){
  var alpha = new Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
  'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z', 
      '0','1','2','3','4','5','6','7','8','9');
  var i;
  for (i=0;i<6;i++){
      var a = alpha[Math.floor(Math.random() * alpha.length)];
      var b = alpha[Math.floor(Math.random() * alpha.length)];
      var c = alpha[Math.floor(Math.random() * alpha.length)];
      var d = alpha[Math.floor(Math.random() * alpha.length)];
      var e = alpha[Math.floor(Math.random() * alpha.length)];
      var f = alpha[Math.floor(Math.random() * alpha.length)];
      var g = alpha[Math.floor(Math.random() * alpha.length)];
                   }
      var code = a + ' ' + b + ' ' + ' ' + c + ' ' + d + ' ' + e + ' '+ f + ' ' + g;
      document.getElementById("mainCaptcha").innerHTML = code
  document.getElementById("mainCaptcha").value = code
    }
function validCaptcha(){
  var string1 = removeSpaces(document.getElementById('mainCaptcha').value);
  var string2 = removeSpaces(document.getElementById('txtInput').value);
  if (string1 == string2){
    sub.disabled=false;
    sub1.disabled = false;
    cap.innerHTML = "Correct";
    setTimeout(function() {
      cap.innerHTML = "";
    } ,2500)
    
  }else{        
    sub.disabled=true;
    sub1.disabled = true;
    cap.innerHTML  = "Incorrect";
    setTimeout(function() {
      cap.innerHTML = "Please enter captcha";
    } ,2500)
  }
}
function removeSpaces(string){
  return string.split(' ').join('');
}
document.getElementById("refresh").addEventListener('click', captcha);
document.getElementById("Button1").addEventListener('click', validCaptcha);
window.onload = captcha();