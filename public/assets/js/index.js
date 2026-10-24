const iconMenu = document.querySelector("#menu-icon");
const asideElem = document.querySelector("#asideMobile");
const header = document.querySelector(".header-mobile");
const listProduct = document.querySelector("#list-product")
const productListBox = document.querySelector(".productListBox")
const nightModeIcon = document.querySelector("#night-mode")

const applyTheme = (isDark) => {
  document.body.classList.toggle("dark", isDark)
  document.body.classList.toggle("light", !isDark)

  const footer = document.querySelector(".nike-foot")
  const proCard = document.querySelector(".pro-card")
  const logo = document.querySelector(".headerDesktop img")

  if (footer) footer.classList.toggle("dark", isDark)
  if (proCard) proCard.classList.toggle("dark", isDark)
  if (logo) logo.setAttribute("src", isDark ? "./assets/images/icons8-nike-100.png" : "./assets/images/icons8-nike-150.png")

  if (isDark) {
    document.querySelectorAll(".product").forEach(function(pro) {
      pro.style.color = "black"
    })
  }
}

window.addEventListener("load", function() {
  const preload = document.getElementById("preloader")
  if (preload) preload.classList.add("hidden")

  applyTheme(localStorage.getItem("theme") === "dark")
})

if (nightModeIcon) {
  nightModeIcon.addEventListener("click", function(){
    const isDark = !document.body.classList.contains("dark")
    localStorage.setItem("theme", isDark ? "dark" : "light")
    applyTheme(isDark)
  })
}

const toggleDisplay = (element, displayStyle) => {
  if (element) {
    element.style.display = displayStyle;
  }
};

if (iconMenu && asideElem && header) {
  iconMenu.addEventListener("click", () => {
    asideElem.classList.toggle("aside-mobile-open");
    if (asideElem.classList.contains("aside-mobile-open")) {
      header.style.filter = "blur(20px)";
    } else {
      header.style.filter = "blur(0px)";
    }
  });
}

if(asideElem && window.innerWidth > 750){ 
  asideElem.classList.remove("aside-mobile-open")
}

document.addEventListener('click', function(event) {
    
    const target = event.target;

    if (target.classList.contains('add') || target.classList.contains('remove') || target.id === 'btn-buy') {
        event.preventDefault();
    }

    if (target.classList.contains('add')) {
        const currentProductDiv = target.closest('.product');
        if (currentProductDiv) {
            const countProduct = currentProductDiv.querySelector('.count');
            let currentCount = parseInt(countProduct.textContent || "0");
            currentCount++;
            countProduct.textContent = currentCount;
        }
    }

    if (target.classList.contains('remove')) {
        const currentProductDiv = target.closest('.product');
        if (currentProductDiv) {
            const countProduct = currentProductDiv.querySelector('.count');
            const shopCart = currentProductDiv.querySelector('.shopCart');
            const buyButton = currentProductDiv.querySelector('#btn-buy');

            let currentCount = parseInt(countProduct.textContent || "0");
            currentCount--;

            if (currentCount < 0) {
                currentCount = 0;
            }
            countProduct.textContent = currentCount;

            if (currentCount === 0) {
                toggleDisplay(shopCart, 'none');
                toggleDisplay(buyButton, 'flex');
            }
        }
    }

    if (target.id === 'btn-buy') {
        const currentProductDiv = target.closest('.product');
        if (currentProductDiv) {
            toggleDisplay(target, 'none');

            const shopCart = currentProductDiv.querySelector('.shopCart');
            const countProduct = currentProductDiv.querySelector('.count');

            toggleDisplay(shopCart, 'flex');

            if (parseInt(countProduct.textContent || "0") < 1) {
                 countProduct.textContent = '1';
            }
        }
    }
});
