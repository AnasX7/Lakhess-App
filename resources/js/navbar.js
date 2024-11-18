const navbar =()=>{
    const nav =document.querySelector("#navbar");
    let lastScrollY=window.scrollY;

    window.onscroll=()=>{
        if(window.scrollY>lastScrollY&&window.scrollY>0){
            //Scrolling down
            nav.classList.remove("scroll-up");
            nav.classList.add("scroll-down");
        }else{
           //Scrolling up
           nav.classList.remove("scroll-down");
           nav.classList.add("scroll-up");
        }
        lastScrollY=window.scrollY;
    };
};

export default navbar;