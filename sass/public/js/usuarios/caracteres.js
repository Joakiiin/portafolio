function limitCharsAndRows(textarea, maxRows, maxCharsPerRow) {
    const counter = document.createElement("div");
    counter.classList.add("counter");
    textarea.parentNode.insertBefore(counter, textarea.nextSibling);
  
    textarea.addEventListener("input", () => {
      const rows = textarea.value.split("\n");
      const numRows = rows.length;
      const numChars = textarea.value.length;
  
      if (numRows > maxRows || (numRows === maxRows && rows[numRows - 1].length > maxCharsPerRow)) {
        textarea.value = rows.slice(0, maxRows).join("\n");
        counter.textContent = `Máximo ${maxRows} filas y ${maxRows * maxCharsPerRow} caracteres.`;
      } else {
        let currentRow = rows[numRows - 1];
        if (currentRow.length > maxCharsPerRow) {
          const newRows = [];
          while (currentRow.length > maxCharsPerRow) {
            newRows.push(currentRow.slice(0, maxCharsPerRow));
            currentRow = currentRow.slice(maxCharsPerRow);
          }
          newRows.push(currentRow);
          const totalRows = numRows + newRows.length - 1;
          if (totalRows > maxRows) {
            textarea.value = rows.slice(0, numRows - 1).join("\n") + "\n" + newRows[0];
            counter.textContent = `Máximo ${maxRows} filas y ${maxRows * maxCharsPerRow} caracteres.`;
          } else {
            rows[numRows - 1] = newRows[0];
            rows.splice(numRows, 0, ...newRows.slice(1));
            textarea.value = rows.join("\n");
            const remainingRows = maxRows - totalRows;
            const remainingChars = maxCharsPerRow - newRows[newRows.length - 1].length;
            counter.textContent = `${remainingRows} filas y ${remainingRows * maxCharsPerRow + remainingChars} caracteres restantes.`;
          }
        } else {
          const remainingRows = maxRows - numRows;
          const remainingChars = maxCharsPerRow - currentRow.length;
          counter.textContent = `${remainingRows} filas y ${remainingRows * maxCharsPerRow + remainingChars} caracteres restantes.`;
        }
      }
    });
  }
  
  const actividades1 = document.getElementById("actividades");
  limitCharsAndRows(actividades1, 4, 125);
