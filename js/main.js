//REGEX FUNCTIONS
const cartDOM = document.querySelector('.cart');
const cartOverlay = document.querySelector('.cart-overlay');

function CheckTextRegex(textField) {
  var textRegex = /[^a-zA-Z ]/i;
  return textRegex.test(textField);
}

function CheckEmailRegex(email) {
  var emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return emailRegex.test(String(email).toLowerCase());
}

//FORM FUNCTIONS

//NUMBER FORMATTER
function NumberInputFormatter(element) {

  if (element.value == "") {
    element.value = 0;
  } else {
    element.value = parseFloat(element.value.replace(/,/g, ""))
      .toFixed(2)
      .toString()
      .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    element.value = this.value.replace(/,/g, "");
  }
};

function ToggleCatFormInput(select) {
  if (select) {
    var div = document.getElementById("input-ilustrador-div");
    if (select.value == "Livro" || select.value == "none") {
      if (div.style.display == "block") {
        div.style.display = "none";
      }
    } else {
      if (div.style.display == "none") {
        div.style.display = "block";
      }
    }
  }
}

function ToggleReadFormInput(select) {
  if (select) {
    var dta_i = document.getElementById("input-dta-i-div");
    var dta_f = document.getElementById("input-dta-f-div");

    if (select.value == "Não Lido" || select.value == "none") {
      dta_i.style.display = "none";
      dta_f.style.display = "none";
    } else if (select.value == "lendo") {
      dta_i.style.display = "block";
      dta_f.style.display = "none";
    } else {
      dta_i.style.display = "block";
      dta_f.style.display = "block";
    }
  }
}

//SIDENAV FUNCTIONS

// Hide submenus
$("#body-row .collapse").collapse("hide");

// Collapse/Expand icon
$("#collapse-icon").addClass("fa-angle-double-left");

// Collapse click
$("[data-toggle=sidebar-colapse]").click(function () {
  SidebarCollapse();
});

function SidebarCollapse() {
  $(".menu-collapsed").toggleClass("d-none");
  $(".sidebar-submenu").toggleClass("d-none");
  $(".submenu-icon").toggleClass("d-none");
  $("#sidebar-container").toggleClass("sidebar-expanded sidebar-collapsed");

  // Treating d-flex/d-none on separators with title
  var SeparatorTitle = $(".sidebar-separator-title");
  if (SeparatorTitle.hasClass("d-flex")) {
    SeparatorTitle.removeClass("d-flex");
  } else {
    SeparatorTitle.addClass("d-flex");
  }

  // Collapse/Expand icon
  $("#collapse-icon").toggleClass("fa-angle-double-left fa-angle-double-right");
}

//Cart functions

function showCart() {
  cartOverlay.classList.add('transparentBcg');
  cartDOM.classList.add('showCart');
}

function closeCart() {
  cartOverlay.classList.remove('transparentBcg');
  cartDOM.classList.remove('showCart');
}

