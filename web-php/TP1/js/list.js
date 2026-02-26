document.addEventListener("DOMContentLoaded", () => {
    const dataForm = document.getElementById("dataForm");

    loadStoredData();
    // load stored data
    function loadStoredData() {
        const savedData = localStorage.getItem("userData");
        if (savedData) {
            displayData(JSON.parse(savedData));
        }
    }
});

// display data
function displayData(dataArray) {
    const dataTbody = document.getElementById("dataTbody");
    dataTbody.innerHTML = "";
    dataArray.forEach((item) => {
        const listItem = document.createElement("tr");
        listItem.innerHTML = `
            <!-- <td>${item.code}</td> -->
            <td>${item.first_name}</td>
            <td>${item.last_name}</td>
            <td id="note">${item.note}</td>
            <td>${item.mention}</td> 
        `;
        dataTbody.appendChild(listItem);
    });
}

