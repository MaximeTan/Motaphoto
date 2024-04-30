// Header

const hamburgerButton = document.querySelector(".nav-toggler")
const navigation = document.querySelector("nav")

// Au clic sur le bouton burger on ajoute la classe active
hamburgerButton.addEventListener("click", toggleNav)

function toggleNav(){
  hamburgerButton.classList.toggle("active")
  navigation.classList.toggle("active")
};

// -------------------------------- //
