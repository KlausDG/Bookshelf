function ValidateBooksRegistration() {
  //RECIEVE FORM //
  var form = document.forms["book-registration"];
  //FORM INPUT //
  var lingua = form['input-lingua'];
  var categoria = form['input-categoria'];
  var generos = form.elements["input-genero[]"];
  var data_publicacao = form["input-datapub"];
  var paginas = form["input-paginas"];
  var tipo_capa = form["input-tipo-capa"];
  var condicao = form["input-condicao"];
  var data_i = form["input-datai"];
  var data_f = form["input-dataf"];

  if (lingua.value == "none") {
    FocusAndAlert(lingua, "Em que lingua está o livro?");
    return false;
  }

  if (categoria.value == "none") {
      FocusAndAlert(categoria, "Qual a categoria do item?");
      return false;
  }

  if(!ValidateGenresCheckboxes(generos)){
    alert("Você deve escolher pelo menos 1 gênero.");
    return false;
  }

  if (data_publicacao.value < 1455) {
    FocusAndAlert(data_publicacao, "Nenhum livro publicado antes de 1455.")
    return false;
  }
  
  if (paginas.value < 0) {
    FocusAndAlert(paginas, "Número de páginas não pode ser negativo.");
    return false;
  }

  if (tipo_capa.value == "none") {
    FocusAndAlert(tipo_capa, "Qual o tipo da capa do item?");
    return false;
  }

  if (condicao.value == "none") {
    FocusAndAlert(condicao, "Em que condição está o item?");
    return false;
  }

  //CHECK DATES
  if (data_i != "" && data_f != "") {
      var c_datai = new Date(data_i.value);
      var c_dataf = new Date(data_f.value);
    
      if (c_datai > c_dataf) {
          FocusAndAlert(data_i, "Data inicial não pode ser maior do que a final.");
      }
      
  }

  return true;
}

function FocusAndAlert(element, message){
    element.focus();
    alert(message);
}

function ValidateGenresCheckboxes(genres) {
  for (var i = 0; i < genres.length; i++) {
    if (genres[i].checked) {
      return true;
    }
  }
  return false;
}

function pesqref(input) {
  var query = input.value;
  var id = "#" + input.id;
  var target = id + "-list";

  if (query != "") {
    $.ajax({
      url: "pesqref.php",
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
}

//AJAX
$(document).ready(function() {
  var checkbox = document.getElementById("genero");
  var dropdown_array = document.getElementsByClassName("dropdown");

  $.ajax({
    url: "functions.php",
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
      url: "functions.php",
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
