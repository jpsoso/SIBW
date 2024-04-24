async function getMalasPalabrasJSON() {
  let response = await fetch('/malasPalabras.php', { //CONTROLADOR
      method: 'POST',
      headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
      },
  });

  let data = await response.json();
  return data;
}


async function censura() 
{
  let palabrasFeillas = await getMalasPalabrasJSON();
  palabrasFeillas = palabrasFeillas.map(palabra => palabra.palabraProhibida.toLowerCase()); // Convertir de JSON a array
  console.log(palabrasFeillas);
  document.getElementById('comment').addEventListener('input', sustituyeMalasPalabras);
  function sustituyeMalasPalabras()
  {
    var textArea = document.getElementById('comment');
    var comentario = textArea.value;

    var comentarioCensurado = comentario;
    for (const palabra of palabrasFeillas) {
        var regex = new RegExp(`\\b${palabra}\\b`, 'gi');
        comentarioCensurado = comentario.replace(regex, (match) => '*'.repeat(match.length));
        comentario = comentarioCensurado;
    }

    textArea.value = comentario;
  }
}

censura();


