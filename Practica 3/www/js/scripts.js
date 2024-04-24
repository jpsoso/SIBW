/* Cambiamos la posición para que aparezca */
function openNav() {  
  document.getElementById("mySidenav").style.left = "0px";
}

/* Cambiamos la posición para que desaparezca */
  function closeNav() {
    document.getElementById("mySidenav").style.left = "-300px";
    closeNewComment();
}

// Abrimos la pestaña del comentario nuevo
function openNewComment() {  
  document.getElementById("newComment").style.left = "300px";
}

// Cerramos la pestaña del comentario nuevo 
function closeNewComment() {
  document.getElementById("newComment").style.left = "-300px";
  resetForm();
}

function validarEmail(email) {
  // Expresión regular para validar un correo electrónico
  const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  return regex.test(email);
}

// Filtrado para añadir el comentario 
function addComment() {
  var name = document.getElementById("form").elements.namedItem("fname").value;
  var email = document.getElementById("form").elements.namedItem("lmail").value;
  var comentario = document.getElementById("comment").value;
  var check_email = false;
  var check_comment = false;
  var check_name = false; 
  
  if (!validarEmail(email) || email == "")
  {
    document.getElementById("invalid_mail").style.display = "block";
    check_email = false; 
  }
  else
  {
    document.getElementById("invalid_mail").style.display = "none";
    check_email = true;
  }
  
  if (name == "")
  {
    document.getElementById("null_name").style.display = "block";
    check_name = false; 
  }
  else
  {
    document.getElementById("null_name").style.display = "none";
    check_name = true;
  }

  if (comentario == "")
  {
    document.getElementById("null_comment").style.display = "block";
    check_comment = false; 
  }
  else
  {
    document.getElementById("null_comment").style.display = "none";
    check_comment = true;
  }

  if (check_comment && check_email && check_name)
  {
    insertComment(name, comentario);
    resetForm();
  }
}

// Añadir comentario a la página
function insertComment(name, comment)
{
  var tiempoTranscurrido = Date.now();
  var hoy = new Date(tiempoTranscurrido);
  var comentario = '<div class="comment"> <div class="user_name">' + name + '</div> <div class="commentary">' + comment + '</div><div class="date">' + hoy.toLocaleDateString() + ' ' + hoy.getHours() + ':' + hoy.getMinutes() + ' </div></div>';
  document.getElementById("mySidenav").innerHTML += comentario;
}

// Vaciar el formulario de comentario
function resetForm() {
  document.getElementById("form").reset();
}



/*
  document.getElementById("comment").value = document.getElementById("comment").value.replace(/ p[uúù][t7][aáà]/i , " **** ");                              // PUTA
  document.getElementById("comment").value = document.getElementById("comment").value.replace(/ p[uúù][t7][oóò0]/i , " **** ");                             // PUTO
  document.getElementById("comment").value = document.getElementById("comment").value.replace(/ m[i1!][e3][r@][d4][a4]/i , " ****** ");                     // MIERDA
  document.getElementById("comment").value = document.getElementById("comment").value.replace(/ [ck][oóò0][jh][oóò0][n][eèé3][s5]/i , " ******* ");         // COJONES
  document.getElementById("comment").value = document.getElementById("comment").value.replace(/ [ck][oóò0]ñ[oóò0]/i , " **** ");                            // COÑO
  document.getElementById("comment").value = document.getElementById("comment").value.replace(/ [gj][iìí1][l][iìí1]p[oóò0]ll[aáà][s5]/i , " ********** ");  // GILIPOLLAS
  document.getElementById("comment").value = document.getElementById("comment").value.replace(/ [gj][iìí1][l][iìí1]p[oóò0]y[aáà][s5]/i , " ********* ");    // GILIPOYAS
  document.getElementById("comment").value = document.getElementById("comment").value.replace(/ [aáà][s5]q[eèé3]r[oóò0][s5][oóò0]/i , " ********* ");       // ASQUEROSO
*/





// Galería ---------------------------------------------------------

let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
}
