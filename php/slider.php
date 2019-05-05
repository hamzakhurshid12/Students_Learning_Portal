<div class="w3-content w3-section" style="max-width:100%; height:20vh">
<img class="mySlides" src="assets/images/slider1.jpg" style="width:100%; height:50vh">
<img class="mySlides" src="assets/images/slider2.jpg" style="width:100%; height:50vh">
<img class="mySlides" src="assets/images/slider3.png" style="width:100%; height:50vh">
<img class="mySlides" src="assets/images/slider4.png" style="width:100%; height:50vh">
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
var i;
var x = document.getElementsByClassName("mySlides");
for (i = 0; i < x.length; i++) {
  x[i].style.display = "none";  
}
myIndex++;
if (myIndex > x.length) {myIndex = 1}    
x[myIndex-1].style.display = "block";  
setTimeout(carousel, 5000); // Change image every 2 seconds
}
</script>