function count() {
    let totalRowCount = 0;
    let rowCount = 0;

    let table = document.getElementById("table");
    let rows = table.getElementsByTagName("tr");

    let msg = document.getElementById("cnt");

    for (let i = 0; i < rows.length; i++) {
        totalRowCount++;
        if (rows[i].getElementsByTagName("td").length > 0) {
            rowCount++;
        }
    }

    let message = "\nRow Count: " + rowCount;
    message += "\n Total Row Count: " + totalRowCount;

    msg.innerText = rowCount;
    return rowCount;
}

function countAvr() {
    let student = count();

    let notes = document.querySelectorAll("#note");
    let sum = 0;
    let avr = 0;

    for (let i = 0; i < student; i++) {
        sum += Number(notes[i].textContent);
    }

    avr = parseFloat(sum / student).toFixed(2);
    document.getElementById("avr").textContent = avr;
}
