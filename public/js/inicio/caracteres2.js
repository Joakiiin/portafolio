function limitChars(textarea, maxRows, maxCharsPerRow) {
  textarea.addEventListener("input", () => {
    const rows = textarea.value.split("\n");
    const numRows = rows.length;

    if (numRows > maxRows) {
      textarea.value = rows.slice(0, maxRows).join("\n");
    } else {
      let currentRow = rows[numRows - 1];
      if (currentRow.length > maxCharsPerRow) {
        // Dividir la última fila en varias filas
        const newRows = [];
        while (currentRow.length > maxCharsPerRow) {
          newRows.push(currentRow.slice(0, maxCharsPerRow));
          currentRow = currentRow.slice(maxCharsPerRow);
        }
        newRows.push(currentRow);
        rows[numRows - 1] = newRows[0];
        rows.splice(numRows, 0, ...newRows.slice(1));
        textarea.value = rows.join("\n");
      }
    }
  });
}

const ActividadesRep1C = document.getElementById("ActividadesRep");
limitChars(ActividadesRep1C, 4, 90);

const pregunta1C = document.getElementById("pregunta1");
limitChars(pregunta1C, 4, 125);

const pregunta2C = document.getElementById("pregunta2");
limitChars(pregunta2C, 4, 125);

const pregunta3C = document.getElementById("pregunta3");
limitChars(pregunta3C, 4, 125);

const pregunta4C = document.getElementById("pregunta4");
limitChars(pregunta4C, 4, 125);

const pregunta5C = document.getElementById("pregunta5");
limitChars(pregunta5C, 4, 125);
