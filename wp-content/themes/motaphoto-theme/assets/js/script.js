//header
const hamburgerButton = document.querySelector(".nav-toggler")
const navigation = document.querySelector("nav")

hamburgerButton.addEventListener("click", toggleNav)

function toggleNav(){
  hamburgerButton.classList.toggle("active")
  navigation.classList.toggle("active")
};

//

// Modal

let modal = document.getElementById('myModal');
const btn = document.querySelectorAll('.contact-btn')
btn.forEach(function(button ) {
    button.addEventListener('click', function(e){
      e.preventDefault();
      modal.style.animation = "fadeIn 1s"
      modal.style.display = "block";
    });
})

window.addEventListener('click', function(event) {
    if (event.target === modal) {
        modal.style.animation = "fadeOut 1s";
        setTimeout(()=>{modal.style.display = 'none';
        modal.classList.remove('fade-out')
      },1000)
    }
});