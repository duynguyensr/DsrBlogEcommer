function changeQuantity(type) {
  const quantity = document.querySelector(".quantity-product");
  if (type == "+") {
    quantity.value = ++quantity.value;
  } else {
    if (quantity.value != "1") {
      quantity.value = --quantity.value;
    }
  }
}
function showDes(num) {
  const des = document.querySelector(".product-description");
  const more = document.querySelector(".more-menu");
  const desClick = document.querySelector(".des");
  const moreClick = document.querySelector(".more");
  if (num === 1) {
    des.style.display = "block";
    more.style.display = "none";
    desClick.style.color = "rgb(245 158 11)";
    desClick.style.setProperty("--length", "100%");
    moreClick.style.color = "black";
  } else {
    des.style.display = "none";
    more.style.display = "block";
    desClick.style.color = "black";
    moreClick.style.color = "rgb(245 158 11)";
  }
}
