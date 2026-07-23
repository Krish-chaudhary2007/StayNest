/*==================================================
            STAYNEST SCRIPT.JS
                PART 1
==================================================*/

document.addEventListener("DOMContentLoaded", () => {

    /*==========================
        Navbar Shadow on Scroll
    ==========================*/

    const navbar = document.querySelector(".navbar");

    window.addEventListener("scroll", () => {

        if (window.scrollY > 50) {
            navbar.classList.add("shadow");
        } else {
            navbar.classList.remove("shadow");
        }

    });


    /*==========================
        Active Navigation Link
    ==========================*/

    const currentPage = window.location.pathname.split("/").pop();

    document.querySelectorAll(".nav-link").forEach(link => {

        const href = link.getAttribute("href");

        if (href === currentPage) {

            link.classList.add("active");

        }

    });


    /*==========================
        Smooth Scroll
    ==========================*/

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {

        anchor.addEventListener("click", function (e) {

            const target = document.querySelector(this.getAttribute("href"));

            if (target) {

                e.preventDefault();

                target.scrollIntoView({

                    behavior: "smooth"

                });

            }

        });

    });


    /*==========================
        Fade Up Animation
    ==========================*/

    const fadeElements = document.querySelectorAll(".fade-up");

    if (fadeElements.length > 0) {

        const observer = new IntersectionObserver((entries) => {

            entries.forEach(entry => {

                if (entry.isIntersecting) {

                    entry.target.classList.add("show");

                }

            });

        }, {

            threshold: 0.2

        });

        fadeElements.forEach(element => {

            observer.observe(element);

        });

    }


    /*==========================
        Property Gallery
    ==========================*/

    const mainImage = document.querySelector(".property-main-image")
        || document.querySelector(".col-lg-8 > img");

    const thumbnails = document.querySelectorAll(".gallery img, .row.g-3 img");

    if (mainImage && thumbnails.length > 0) {

        thumbnails.forEach(image => {

            image.addEventListener("click", () => {

                const temp = mainImage.src;

                mainImage.src = image.src;

                image.src = temp;

            });

        });

    }


    /*==========================
        Scroll To Top Button
    ==========================*/

    const scrollBtn = document.createElement("button");

    scrollBtn.innerHTML = '<i class="bi bi-arrow-up"></i>';

    scrollBtn.className = "btn btn-primary";

    scrollBtn.style.position = "fixed";
    scrollBtn.style.right = "20px";
    scrollBtn.style.bottom = "20px";
    scrollBtn.style.width = "50px";
    scrollBtn.style.height = "50px";
    scrollBtn.style.borderRadius = "50%";
    scrollBtn.style.display = "none";
    scrollBtn.style.zIndex = "999";

    document.body.appendChild(scrollBtn);

    window.addEventListener("scroll", () => {

        if (window.scrollY > 300) {

            scrollBtn.style.display = "block";

        } else {

            scrollBtn.style.display = "none";

        }

    });

    scrollBtn.addEventListener("click", () => {

        window.scrollTo({

            top: 0,

            behavior: "smooth"

        });

    });


    /*==========================
        Image Hover Effect
    ==========================*/

    document.querySelectorAll("img").forEach(img => {

        img.setAttribute("draggable", "false");

    });

});

/*==================================================
            STAYNEST SCRIPT.JS
                PART 2
==================================================*/

/*==========================
    Validation Functions
==========================*/

function isValidEmail(email){

    const pattern=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    return pattern.test(email);

}

function showAlert(message,type="danger"){

    const oldAlert=document.querySelector(".custom-alert");

    if(oldAlert){

        oldAlert.remove();

    }

    const alert=document.createElement("div");

    alert.className=`alert alert-${type} custom-alert mt-3`;

    alert.innerText=message;

    const container=document.querySelector("form");

    if(container){

        container.prepend(alert);

        setTimeout(()=>{

            alert.remove();

        },3000);

    }

}

/*==========================
        Login Form
==========================*/

const loginForm=document.getElementById("loginForm");

if(loginForm){

    loginForm.addEventListener("submit",function(e){

        e.preventDefault();

        const email=document.getElementById("loginEmail").value.trim();

        const password=document.getElementById("loginPassword").value.trim();

        if(email===""){

            showAlert("Please enter your email.");

            return;

        }

        if(!isValidEmail(email)){

            showAlert("Please enter a valid email.");

            return;

        }

        if(password===""){

            showAlert("Please enter your password.");

            return;

        }

        if(password.length<6){

            showAlert("Password must contain at least 6 characters.");

            return;

        }

        showAlert("Login Successful!","success");

        loginForm.reset();

    });

}

/*==========================
        Signup Form
==========================*/

const signupForm=document.getElementById("signupForm");

if(signupForm){

    signupForm.addEventListener("submit",function(e){

        e.preventDefault();

        const fullName=document.getElementById("fullName").value.trim();

        const email=document.getElementById("signupEmail").value.trim();

        const phone=document.getElementById("phone").value.trim();

        const city=document.getElementById("city").value;

        const password=document.getElementById("signupPassword").value;

        const confirmPassword=document.getElementById("confirmPassword").value;

        const terms=document.getElementById("terms");

        if(fullName.length<3){

            showAlert("Enter your full name.");

            return;

        }

        if(!isValidEmail(email)){

            showAlert("Enter a valid email address.");

            return;

        }

        if(phone.length<10){

            showAlert("Enter a valid phone number.");

            return;

        }

        if(city===""){

            showAlert("Please select your city.");

            return;

        }

        if(password.length<6){

            showAlert("Password should be at least 6 characters.");

            return;

        }

        if(password!==confirmPassword){

            showAlert("Passwords do not match.");

            return;

        }

        if(!terms.checked){

            showAlert("Please accept Terms & Conditions.");

            return;

        }

        showAlert("Account Created Successfully!","success");

        signupForm.reset();

    });

}

/*==========================
Live Password Strength
==========================*/

const signupPassword=document.getElementById("signupPassword");

if(signupPassword){

    signupPassword.addEventListener("keyup",function(){

        const value=this.value;

        if(value.length<6){

            this.style.borderColor="red";

        }

        else if(value.length<10){

            this.style.borderColor="orange";

        }

        else{

            this.style.borderColor="green";

        }

    });

}

/*==========================
Confirm Password
==========================*/

const confirmPassword=document.getElementById("confirmPassword");

if(confirmPassword){

    confirmPassword.addEventListener("keyup",function(){

        if(this.value!==signupPassword.value){

            this.style.borderColor="red";

        }

        else{

            this.style.borderColor="green";

        }

    });

}

/*==================================================
            STAYNEST SCRIPT.JS
                PART 3
==================================================*/

/*==========================
    Interested Button
==========================*/

const interestedBtn = document.querySelector(".interested-btn");

if (interestedBtn) {

    interestedBtn.addEventListener("click", () => {

        interestedBtn.classList.toggle("btn-danger");
        interestedBtn.classList.toggle("btn-outline-danger");

        if (interestedBtn.classList.contains("btn-danger")) {

            interestedBtn.innerHTML =
                '<i class="bi bi-heart-fill me-2"></i>Interested';

        } else {

            interestedBtn.innerHTML =
                '<i class="bi bi-heart me-2"></i>Removed';

        }

    });

}

/*==========================
    Book Visit
==========================*/

const visitBtn = document.querySelector(".visit-btn");

if (visitBtn) {

    visitBtn.addEventListener("click", () => {

        alert("Visit request submitted successfully.");

    });

}

/*==========================
    Contact Owner
==========================*/

const contactBtn = document.querySelector(".contact-btn");

if (contactBtn) {

    contactBtn.addEventListener("click", () => {

        alert("Owner Contact : +91 98765 43210");

    });

}

/*==========================
    Wishlist Heart Buttons
==========================*/

const heartButtons = document.querySelectorAll(".heart-btn");

heartButtons.forEach(button => {

    button.addEventListener("click", () => {

        const icon = button.querySelector("i");

        button.classList.toggle("active");

        if (button.classList.contains("active")) {

            icon.classList.remove("bi-heart");

            icon.classList.add("bi-heart-fill");

        } else {

            icon.classList.remove("bi-heart-fill");

            icon.classList.add("bi-heart");

        }

    });

});

/*==========================
    Newsletter
==========================*/

const newsletterBtn = document.querySelector(".newsletter-btn");

if (newsletterBtn) {

    newsletterBtn.addEventListener("click", () => {

        const emailInput =
            document.getElementById("newsletterEmail");

        if (!emailInput) return;

        const email = emailInput.value.trim();

        if (email === "") {

            alert("Please enter your email.");

            return;

        }

        if (!isValidEmail(email)) {

            alert("Please enter a valid email.");

            return;

        }

        alert("Subscribed Successfully!");

        emailInput.value = "";

    });

}

/*==========================
    Google Login
==========================*/

const googleLoginBtn =
    document.querySelector(".google-login-btn");

if (googleLoginBtn) {

    googleLoginBtn.addEventListener("click", () => {

        alert("Google Login Coming Soon!");

    });

}

/*==========================
    Google Signup
==========================*/

const googleSignupBtn =
    document.querySelector(".google-signup-btn");

if (googleSignupBtn) {

    googleSignupBtn.addEventListener("click", () => {

        alert("Google Signup Coming Soon!");

    });

}




/*==========================
    Keyboard Shortcut
==========================*/

document.addEventListener("keydown", function (e) {

    if (e.key === "Escape") {

        document.activeElement.blur();

    }

});

/*==========================
    Console Message
==========================*/

console.log("StayNest Project Loaded Successfully.");

/*==================================================
            STAYNEST SCRIPT.JS
                PART 4
      Utility Functions & UI Enhancements
==================================================*/

/*==========================
    Loading Button
==========================*/

function setButtonLoading(button, text = "Please Wait...") {

    if (!button) return;

    button.dataset.originalText = button.innerHTML;
    button.innerHTML =
        `<span class="spinner-border spinner-border-sm me-2"></span>${text}`;
    button.disabled = true;

}

function resetButton(button) {

    if (!button) return;

    button.innerHTML = button.dataset.originalText;
    button.disabled = false;

}

/*==========================
    Auto Close Alerts
==========================*/

document.querySelectorAll(".alert").forEach(alert => {

    setTimeout(() => {

        alert.classList.add("fade");

        setTimeout(() => {

            alert.remove();

        }, 300);

    }, 3000);

});

/*==========================
    Number Animation
==========================*/

function animateNumber(element, target) {

    let current = 0;

    const speed = Math.ceil(target / 80);

    const timer = setInterval(() => {

        current += speed;

        if (current >= target) {

            current = target;

            clearInterval(timer);

        }

        element.innerText = current;

    }, 20);

}

document.querySelectorAll("[data-count]").forEach(item => {

    animateNumber(item, Number(item.dataset.count));

});

/*==========================
    Copy Text
==========================*/

function copyText(text) {

    navigator.clipboard.writeText(text)
        .then(() => {

            alert("Copied Successfully!");

        });

}

/*==========================
    Share Page
==========================*/

const shareBtn = document.querySelector(".share-btn");

if (shareBtn) {

    shareBtn.addEventListener("click", async () => {

        if (navigator.share) {

            await navigator.share({

                title: document.title,

                text: "Check this property",

                url: window.location.href

            });

        } else {

            copyText(window.location.href);

        }

    });

}

/*==========================
    Current Year
==========================*/

const year = document.querySelector(".current-year");

if (year) {

    year.textContent = new Date().getFullYear();

}

/*==========================
    Prevent Double Submit
==========================*/

document.querySelectorAll("form").forEach(form => {

    form.addEventListener("submit", () => {

        const btn = form.querySelector('button[type="submit"]');

        if (!btn) return;

        setButtonLoading(btn);

        setTimeout(() => {

            resetButton(btn);

        }, 1500);

    });

});

/*==========================
    Window Loaded
==========================*/

window.addEventListener("load", () => {

    document.body.classList.add("loaded");

});

console.log("StayNest Utilities Loaded");

