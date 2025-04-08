let toTopBtn = document.querySelector(".scroll-to-top-btn");

toTopBtn.addEventListener("click", ()=>{
    window.scrollTo({top: 0, behavior: "smooth"});
});