document.addEventListener("DOMContentLoaded", () => {
  const formElement = document.querySelector("#selectFilter");

  formElement.addEventListener("change", () => {
    const formData = new FormData(formElement);
    const params = new URLSearchParams(formData);
    params.append("ajax", true);

    const url = new URL(window.location.href);

    fetch(`${url.pathname}?${params.toString()}&ajax=1`, {
      method: "GET",
      headers: {
        "X-Requested-With": "XMLHttpRequest",
      },
    })
      .then((response) => response.json())
      .then((data) => {
        filtrerEtAfficherVoitures(data);
      })
      .catch((e) => console.error(e));
  });
});

function filtrerEtAfficherVoitures(voitures) {
  const marqueSelectionnee = document
    .querySelector("#selectFilterBrands")
    .value.toLowerCase();
  const prix = document.querySelector("#selectFilterPrice").value;
  const carburant = document
    .querySelector("#selectFilterFuel")
    .value.toLowerCase();
  const kilometres = document.querySelector("#selectFilterMiles").value;

  const voituresFiltrees = voitures.filter((voiture) => {
    const marqueVoiture = voiture.marque.nom.toLowerCase(); // Accède à la propriété 'nom' de 'marque'
    const carburantVoiture = voiture.carburant.toLowerCase(); // S'assure que la comparaison est insensible à la casse
    return (
      (marqueSelectionnee === "choice" ||
        marqueVoiture === marqueSelectionnee) &&
      (carburant === "choice" || carburantVoiture === carburant) &&
      filtrePrix(voiture.prix, prix) &&
      filtreKilometres(voiture.kilometrage, kilometres)
    );
  });

  afficherVoituresFiltrees(voituresFiltrees);
}

function filtrePrix(prixVoiture, criterePrix) {
  if (criterePrix === "Choice") return true;
  const [min, max] = criterePrix.split("-").map(Number);
  return prixVoiture >= min && (!max || prixVoiture <= max);
}

function filtreKilometres(kmVoiture, critereKm) {
  if (critereKm === "choice") return true;
  const [min, max] = critereKm.split("-").map(Number);
  return kmVoiture >= min && (!max || kmVoiture <= max);
}

function afficherVoituresFiltrees(voituresFiltrees) {
  const conteneurVoitures = document.querySelector(
    "#containerVoituresOccasions"
  );
  conteneurVoitures.innerHTML = ""; // Efface le contenu actuel

  voituresFiltrees.forEach((voiture) => {
    let imageURL = voiture.image
      ? `/images/products/${voiture.image}`
      : "images/products/citroendsgrise-655b6fffe11e9217280427";
    if (
      voiture.voituresOcassionsImages &&
      voiture.voituresOcassionsImages.length > 0
    ) {
      imageURL = `/images/products/${voiture.voituresOcassionsImages[0].nom}`; // Première image disponible
    }

    const divVoiture = document.createElement("div");
    divVoiture.className = "cardOccasions";
    divVoiture.innerHTML = `
            <img class="img" src="${imageURL}" alt="Image de ${voiture.marque.nom} ${voiture.marque.modeles}">
            <div class="description">
                <h4 class="titleDescription">${voiture.marque.nom} - ${voiture.marque.modeles}</h4>
                <p>Prix: ${voiture.prix}€</p>
                <p>Année: ${voiture.annee}</p>
                <p>Kilométrage: ${voiture.kilometrage}km</p>
                <p>Carburant: ${voiture.carburant}</p>
                <p>Boite de vitesse: ${voiture.boiteDeVitesse}</p>
            </div>
        `;
    conteneurVoitures.appendChild(divVoiture);
  });
}

console.log("im here");
