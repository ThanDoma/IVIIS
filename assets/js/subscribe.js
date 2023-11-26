document.getElementById("form1").addEventListener("change", function () {
    if (this.checked) {
      document.querySelector(".form-container.active").classList.remove("active");
      this.parentElement.classList.add("active");
    }
  });

  document.getElementById("form2").addEventListener("change", function () {
    if (this.checked) {
      document.querySelector(".form-container.active").classList.remove("active");
      this.parentElement.classList.add("active");
    }
  });