document.addEventListener("DOMContentLoaded", function () {
    student();
});

function student() {
    const std = document.getElementById("std");
    std.innerHTML = `
    <div class="student">
        <h1>
            <p>Mohammed El Idrissi Laoukili</p>
            <p>CNE: N138233752</p>
            <p>Code: 35236</p>
        </h1>
    </div>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inconsolata:wght@200..900&display=swap");
        .student {
            position: fixed;
            top: 0;
            right: 0;
            line-height: 5px;
            font-size: 9px;
            margin: 1rem 1rem;
            padding: 0rem 0.5rem;
            border-radius: 10px;

            font-family: "Inconsolata", monospace;
            font-optical-sizing: auto;
            font-weight: weight;
            font-style: normal;
            font-variation-settings: "wdth" 100;

            box-shadow: 0px 4px 12px  0px rgba(0, 0, 0, 0.5);
            background-color: rgba(255, 255, 255, 0.7);

            border: 2px solid rgb(160, 14, 14, 0.5);
            box-shadow: 0px 0 4px 0 rgb(160, 14, 14, 0.5);
        }

        h1, p{
            background-color: inherit;
        }
    </style>
    
    `;
}
