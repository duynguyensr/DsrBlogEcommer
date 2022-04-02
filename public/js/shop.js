const open_filter = document.querySelector(".open_filter");
const filter = document.querySelector(".filter");
const close_filter = document.querySelector(".close-filter");

open_filter.addEventListener("click", () => {
  filter.classList.toggle("show");
});

close_filter.addEventListener("click", () => {
  filter.classList.toggle("show");
});

const input_range = document.querySelector(".price-range");

input_range.addEventListener("change", (event) => {
  const result = document.querySelector(".result");
  result.textContent = `${event.target.value}` + "đ";
});

const select_range = document.querySelector(".filter .price-range");

select_range.addEventListener("change", (event) => {
  const result = document.querySelector(".filter .result");
  result.textContent = `${event.target.value}` + "đ";
});
