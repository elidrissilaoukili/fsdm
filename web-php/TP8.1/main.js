// function Maj() {
//   let d = new Date();
//   let jourSemaine = d.getDay();
//   let jour = d.getDate();
//   let mois = d.getMonth() + 1;
//   let annee = d.getFullYear();
//   str = "";
//   switch (jourSemaine) {
//     case 1:
//       str += "Lundi ";
//       break;
//     case 2:
//       str += "Mardi ";
//       break;
//     case 3:
//       str += "Mercredi ";
//       break;
//     case 4:
//       str += "Jeudi ";
//       break;
//     case 5:
//       str += "Vendredi ";
//       break;
//     case 6:
//       str += "Samedi ";
//       break;
//     case 7:
//       str += "Dimande ";
//       break;
//   }
//   str += jour;
//   switch (mois) {
//     case 1:
//       str += " Janvier ";
//       break;
//     case 2:
//       str += " Fevrier ";
//       break;
//     case 3:
//       str += " Mars ";
//       break;
//     case 4:
//       str += " Avril ";
//       break;
//     case 5:
//       str += " Mai ";
//       break;
//     case 6:
//       str += " Juin ";
//       break;
//     case 7:
//       str += " Juillet ";
//       break;
//     case 7:
//       str += " Aout ";
//       break;
//     case 7:
//       str += " Septembre ";
//       break;
//     case 7:
//       str += " Octobre ";
//       break;
//     case 7:
//       str += " Novembre ";
//       break;
//     case 7:
//       str += " Decembre ";
//       break;
//   }
//   str += annee;
//   let divDate = document.querySelector("#date");
//   divDate.innerHTML = str;
// }
// document.addEventListener("DOMContentLoaded", () => {
//   Maj();
// });
function verification() {
  let code = document.querySelector("#code").value;
  let nom = document.querySelector("#nom").value;
  let prenom = document.querySelector("#prenom").value;
  let note = document.querySelector("#note").value;
  if (code == "" || nom == " " || prenom == "" || note == "") {
    alert("probleme! Veuillez saisir quelque chose");
  } else {
    if (note > 20 || note < 0) {
      alert("probleme! veuillez saisir une note convenable");
    } else{
        alert("Mension: "+ calculerMension(note))
    }
  }
}
function calculerMension(note) {
  let mension = "";
  if (note >= 10 && note < 12) {
    mension = "Passable";
  } else if (note >= 12 && note < 14) {
    mension = "Assez bien";
  } else if (note >= 14 && note < 16) {
    mension = "Bien";
  } else if (note >= 16 && note < 18) {
    mension = "Tres Bien";
  } else {
    mension = "Excellent";
  }
  return mension
}
