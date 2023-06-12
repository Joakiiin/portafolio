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

const actividades = document.getElementById("actividades");
limitChars(actividades, 4, 125);
