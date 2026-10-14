<div class="popup" id="popup">

<div class="popup-content">

<h2 id="pname"></h2>

<p><b>Tác giả:</b> <span id="pauthor"></span></p>

<p><b>Giá:</b> <span id="pprice"></span></p>

<p id="pdesc"></p>

<button onclick="addCart()">Thêm vào giỏ</button>

<button onclick="closePopup()">Đóng</button>

</div>

</div>

<script>

function showPopup(name,author,price,desc){

document.getElementById("popup").style.display="block";

document.getElementById("pname").innerHTML=name;

document.getElementById("pauthor").innerHTML=author;

document.getElementById("pprice").innerHTML=price+"đ";

document.getElementById("pdesc").innerHTML=desc;

}

function closePopup(){

document.getElementById("popup").style.display="none";

}

function addCart(){

window.location="cart.php?action=add&name="+bookName+"&price="+bookPrice

}

</script>