function ValidateBooksRegistration() {
  //RECIEVE FORM //
  var form = document.forms["book-registration"];
  //FORM INPUT //
  var lingua = form['input-lingua'];
  var categoria = form['input-categoria'];
  var generos = form.elements["input-genero[]"];
  var paginas = form["input-paginas"];
  var tipo_capa = form["input-tipo-capa"];
  var condicao = form["input-condicao"];
  var data_i = form["input-datai"];
  var data_f = form["input-dataf"];

  //CHECK DATES
  if (data_i != "" && data_f != "") {
      var c_datai = new Date(data_i.value);
      var c_dataf = new Date(data_f.value);
    
      if (c_datai > c_dataf) {
          FocusAndAlert(data_i, "Data inicial não pode ser maior do que a final.");
          return false;
      }
  }
  return true;
}

function FocusAndAlert(element, message){
    element.focus();
    alert(message);
}

//AJAX FUNCTIONS
function pesqref(input) {
  var query = input.value;
  var id = "#" + input.id;
  var target = id + "-list";

  if (query != "") {
    $.ajax({
      url: "controller-pesqref.php",
      method: "POST",
      data: {
        query: query,
        table: input.id
      },
      success: function(data) {
        $(target).fadeIn();
        $(target).html(data);
      }
    });
  } else {
    $(target).fadeOut();
    $(target).html("");
  }
  $(document).on("click", "li", function() {
    $(id).val($(this).text());
    $(target).fadeOut();
  });
  $(document).click(function(event) { 
    $target = $(event.target);
    if(!$target.closest('#pesqref-list').length && 
    $('#pesqref-list').is(":visible")) {
      $('#pesqref-list').hide();
    }        
  });
}

function pesqref2(input) {
  var query = input.value;
  var id = "#" + input.id;
  var target = id + "-list";

  if (query != "") {
    $.ajax({
      url: "controller-pesqref.php",
      method: "POST",
      data: {
        query: query,
        table: input.id
      },
      success: function(data) {
        $(target).fadeIn();
        $(target).html(data);
      }
    });
  } else {
    $(target).fadeOut();
    $(target).html("");
  }
  $(document).on("click", "li", function() {
    $(id).val($(this).text());
    $(target).fadeOut();
  });
  $(document).click(function(event) { 
    $target = $(event.target);
    if(!$target.closest('#pesqref-list').length && 
    $('#pesqref-list').is(":visible")) {
      $('#pesqref-list').hide();
    }        
  });
}

$(document).ready(function() {
  var checkbox = document.getElementById("genero");
  var dropdown_array = document.getElementsByClassName("dropdown");

  $.ajax({
    url: "controller-checkbox-ajax.php",
    method: "POST",
    data: {
      type: "checkbox",
      id: checkbox.id
    },
    success: function(data) {
      checkbox.innerHTML += data;
    }
  });

  for (let i = 0; i < dropdown_array.length; i++) {
    $.ajax({
      url: "controller-checkbox-ajax.php",
      method: "POST",
      data: {
        type: "dropdown",
        id: dropdown_array[i].id
      },
      success: function(data) {
        var result = data.split(",");
        dropdown_array[i].innerHTML += result[1];
      }
    });
  }
});
