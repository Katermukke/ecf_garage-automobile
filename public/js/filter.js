document.addEventListener("DOMContentLoaded", () => {
  const formElement = document.querySelector("#selectFilter");

  formElement.addEventListener("change", () => {
    const formData = new FormData(formElement);
    const params = new URLSearchParams();
    params.append("ajax", true);

    for (let [key, value] of formData.entries()) {
      console.log(`${key}: ${value}`);
    }

    const url = new URL(window.location.href);

    // On lance la requetes ajax
    fetch(url.pathname + "?" + params.toString() + "&ajax1", {
      method: "GET",
      headers: {
        "X-Requested-With": "XMLHttpRequest",
      },
    })
      .then((response) => {
        console.log(response);
      })
      .catch((e) => alert(e));
  });
});

console.log("im here");
