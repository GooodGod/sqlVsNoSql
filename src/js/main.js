let toTopBtn = document.querySelector(".scroll-to-top-btn");
let tabSwitches = document.querySelectorAll(".tab-switch");
let tabs = document.querySelectorAll(".tab");

if(tabSwitches){
  for(let tabSwitch of tabSwitches){
    tabSwitch.addEventListener("click", (e)=>{
      activate(e.target);
    })
  }
}



function activate(clickedSwitch){
  for(let tabSwitch of tabSwitches){
    tabSwitch.classList.remove("active");
  }
  clickedSwitch.classList.add("active");

  for(let tab of tabs){
    tab.classList.remove("active");

    if(tab.dataset.tab == clickedSwitch.dataset.tab){
      tab.classList.add("active");
    }
  }
}


if(toTopBtn){
  toTopBtn.addEventListener("click", ()=>{
    window.scrollTo({top: 0, behavior: "smooth"});
  });
}
