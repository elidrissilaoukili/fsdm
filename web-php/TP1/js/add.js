document.getElementById("dataForm").addEventListener("submit", (event) => {
    event.preventDefault();

    const dataForm = document.getElementById("dataForm");

    // const code = document.getElementById("code").value;
    const first_name = document.getElementById("first_name").value;
    const last_name = document.getElementById("last_name").value;
    const note = document.getElementById("note").value;
    const mention = document.getElementById("mention").value;

    if (first_name === "" || last_name === "" || note === "") {
        alert("Please fill in all fields.");
        return;
    }
    if (note > 20 || note < 0) {
        alert("Note must be beween 0-20");
        return;
    }

    const data = {
        // code: code,
        first_name: first_name,
        last_name: last_name,
        note: note,
        mention: mention,
    };

    saveData(data);
    dataForm.reset();
});

function saveData(data) {
    let savedData = localStorage.getItem("userData");

    if (!savedData) {
        savedData = [];
    } else {
        savedData = JSON.parse(savedData);
    }
    savedData.push(data);
    localStorage.setItem("userData", JSON.stringify(savedData));

    // Redirect to show.html
    window.location.href = "./list.html";
}

function cancel() {
    document.getElementById("dataForm").reset();
}
