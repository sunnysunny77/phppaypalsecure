function increaseCount() {
  var input = this.previousElementSibling;
  var value = parseInt(input.value, 10); 
  value = isNaN(value)? 0 : value;
  value ++;
  input.value = value;
 
}
function decreaseCount() {
  var input = this.nextElementSibling;
  var value = parseInt(input.value, 10); 
  if (value > 1) {
    value = isNaN(value)? 0 : value;
    value --;
    input.value = value;
  }
}
document.getElementById("plus").addEventListener('click', increaseCount);
document.getElementById("minus").addEventListener('click', decreaseCount);