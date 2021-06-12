//Heading nav menu onclick

$(document).ready(function() {
    $("#heading__menubar").click(function() {
        if(!$("#heading__nav-mobile").is(":visible")) {
            $("#heading__nav-mobile").show();
            document.body.classList.add("showForm");

        } else {
            $("#heading__nav-mobile").hide();
            document.body.classList.remove("showForm");
        }
    })
})

//Open Login Form
function openLoginForm() {
    //hide nav mobile
    document.getElementById("heading__nav-mobile").style.display='none';

    document.body.classList.add("showForm");
    document.body.classList.add("showLoginForm");
}

function openRegistrationForm() {
    //hide nav mobile
    document.getElementById("heading__nav-mobile").style.display='none';

    document.body.classList.add("showForm");
    document.body.classList.add("showRegistrationForm");
}
//Close Login Form
function closeForm() {
    //hide nav mobile
    document.getElementById("heading__nav-mobile").style.display='none';
    document.body.classList.remove("showForm");
    document.body.classList.remove("showLoginForm");
    document.body.classList.remove("showRegistrationForm");
}

//Heading On Click
function openBlogPage() {
    closeForm();
    //show blog page
    document.getElementById("blog-page").classList.add("here");
    document.getElementById("blog-container").classList.add("show");

    //hide homepage
    document.getElementById("home-container").classList.remove("show");
    //hide members page
    document.getElementById("community-page").classList.remove("here");
    document.getElementById("members-container").classList.remove("show");
    //hide profile page
    document.getElementById("profile-container").classList.remove("show");
    document.getElementById("waiting-profile-container").classList.remove("show");
    document.getElementById("matches-profile-container").classList.remove("show");

     //hide shop page
     document.getElementById("shop-container").classList.remove("show");
     document.getElementById("shop-page").classList.remove("here");
     //hide waiting members page
     document.getElementById("waiting-container").classList.remove("show");

    //Hide contact page
    document.getElementById("contact-container").classList.remove("show");
    document.getElementById("contact-page").classList.remove("here");
}

function openHomePage() {
    //show Home Page
    document.getElementById("home-container").classList.add("show");

    //Hide blog
    document.getElementById("blog-container").classList.remove("show");
    document.getElementById("blog-page").classList.remove("here");
    //Hide community
    document.getElementById("community-page").classList.remove("here");
    document.getElementById("members-container").classList.remove("show");
    document.getElementById("profile-container").classList.remove("show");
     //hide shop page
     document.getElementById("shop-container").classList.remove("show");
     document.getElementById("shop-page").classList.remove("here");

     //hide waiting page
     document.getElementById("waiting-container").classList.remove("show");

    //Hide contact page
    document.getElementById("contact-container").classList.remove("show");
    document.getElementById("contact-page").classList.remove("here");

        //hide profile page
        document.getElementById("profile-container").classList.remove("show");
        document.getElementById("waiting-profile-container").classList.remove("show");
        document.getElementById("matches-profile-container").classList.remove("show");
}

function openMembersPage() {
    closeForm();

    document.getElementById("members-container").classList.add("show");
    document.getElementById("community-page").classList.add("here");

    document.getElementById("home-container").classList.remove("show");
    document.getElementById("blog-container").classList.remove("show");
    document.getElementById("blog-page").classList.remove("here");
     //hide shop page
     document.getElementById("shop-container").classList.remove("show");
     document.getElementById("shop-page").classList.remove("here");

    //hide waiting page
    document.getElementById("waiting-container").classList.remove("show");

    //Hide contact page
    document.getElementById("contact-container").classList.remove("show");
    document.getElementById("contact-page").classList.remove("here");

        //hide profile page
        document.getElementById("profile-container").classList.remove("show");
        document.getElementById("waiting-profile-container").classList.remove("show");
        document.getElementById("matches-profile-container").classList.remove("show");
}

function openProfile() {
    document.getElementById("profile-container").classList.add("show");
    
    document.getElementById("home-container").classList.remove("show");
    document.getElementById("blog-container").classList.remove("show");
    document.getElementById("home-page").classList.remove("here");
    document.getElementById("blog-page").classList.remove("here");
    document.getElementById("members-container").classList.remove("show");
     //hide shop page
    document.getElementById("shop-container").classList.remove("show");
    document.getElementById("shop-page").classList.remove("here");

    //Hide contact page
    document.getElementById("contact-container").classList.remove("show");
    document.getElementById("contact-page").classList.remove("here");

}

function openWaitingProfile() {
    document.getElementById("waiting-profile-container").classList.add("show");
    
    document.getElementById("home-container").classList.remove("show");
    document.getElementById("blog-container").classList.remove("show");
    document.getElementById("home-page").classList.remove("here");
    document.getElementById("blog-page").classList.remove("here");
    document.getElementById("members-container").classList.remove("show");
    document.getElementById("waiting-container").classList.remove("show");
     //hide shop page
    document.getElementById("shop-container").classList.remove("show");
    document.getElementById("shop-page").classList.remove("here");

    //Hide contact page
    document.getElementById("contact-container").classList.remove("show");
    document.getElementById("contact-page").classList.remove("here");



}

function openMatchesProfile() {
    document.getElementById("matches-profile-container").classList.add("show");
    
    document.getElementById("home-container").classList.remove("show");
    document.getElementById("blog-container").classList.remove("show");
    document.getElementById("home-page").classList.remove("here");
    document.getElementById("blog-page").classList.remove("here");
    document.getElementById("members-container").classList.remove("show");
    document.getElementById("waiting-container").classList.remove("show");
     //hide shop page
    document.getElementById("shop-container").classList.remove("show");
    document.getElementById("shop-page").classList.remove("here");

    //Hide contact page
    document.getElementById("contact-container").classList.remove("show");
    document.getElementById("contact-page").classList.remove("here");

    //hide matches page
    document.getElementById("matches-container").classList.remove("show");
}

function openShopPage() {
    closeForm();

    //Show shop page
    document.getElementById("shop-container").classList.add("show");
    document.getElementById("shop-page").classList.add("here");

    //Hide home page
    document.getElementById("home-container").classList.remove("show");
    document.getElementById("home-page").classList.remove("here");

    //Hide blog page
    document.getElementById("blog-container").classList.remove("show");
    document.getElementById("blog-page").classList.remove("here");

    //Hide Members page
    document.getElementById("members-container").classList.remove("show");
    document.getElementById("community-page").classList.remove("here");

    //hide member profile
    document.getElementById("profile-container").classList.remove("show");
    document.getElementById("waiting-profile-container").classList.remove("show");
    document.getElementById("matches-profile-container").classList.remove("show");

    //hide waiting page
    document.getElementById("waiting-container").classList.remove("show");
    document.getElementById("community-page").classList.remove("show");

    //Hide contact page
    document.getElementById("contact-container").classList.remove("show");
    document.getElementById("contact-page").classList.remove("here");
}

function openWaitingPage() {
    //show waiting page
    document.getElementById("waiting-container").classList.add("show");
    document.getElementById("community-page").classList.add("here");

    //Hide home page
    document.getElementById("home-container").classList.remove("show");
    document.getElementById("home-page").classList.remove("here");

    //Hide blog page
    document.getElementById("blog-container").classList.remove("show");
    document.getElementById("blog-page").classList.remove("here");
    
    //Hide Members page
    document.getElementById("members-container").classList.remove("show");
    
    //hide member profile
    document.getElementById("profile-container").classList.remove("show");
    document.getElementById("waiting-profile-container").classList.remove("show");
    document.getElementById("matches-profile-container").classList.remove("show");

    
    //Hide contact page
    document.getElementById("contact-container").classList.remove("show");
    document.getElementById("contact-page").classList.remove("here");

    document.getElementById("waiting-profile-container").classList.remove("show");

}

function openMatchesPage() {
    //show waiting page
    document.getElementById("matches-container").classList.add("show");
    document.getElementById("community-page").classList.add("here");

    //Hide home page
    document.getElementById("home-container").classList.remove("show");
    document.getElementById("home-page").classList.remove("here");

    //Hide blog page
    document.getElementById("blog-container").classList.remove("show");
    document.getElementById("blog-page").classList.remove("here");
    
    //Hide Members page
    document.getElementById("members-container").classList.remove("show");
    
    //hide member profile
    document.getElementById("profile-container").classList.remove("show");
    document.getElementById("waiting-profile-container").classList.remove("show");
    document.getElementById("matches-profile-container").classList.remove("show");
    //Hide contact page
    document.getElementById("contact-container").classList.remove("show");
    document.getElementById("contact-page").classList.remove("here");
}

function openContactPage() {
    closeForm();

    document.getElementById("contact-container").classList.add("show");
    document.getElementById("contact-page").classList.add("here");
    //Hide home page
    document.getElementById("home-container").classList.remove("show");
    document.getElementById("home-page").classList.remove("here");

    //Hide blog page
    document.getElementById("blog-container").classList.remove("show");
    document.getElementById("blog-page").classList.remove("here");

    //Hide Members page
    document.getElementById("members-container").classList.remove("show");
    document.getElementById("community-page").classList.remove("here");

    //hide member profile
    document.getElementById("profile-container").classList.remove("show");
    document.getElementById("waiting-profile-container").classList.remove("show");
    document.getElementById("matches-profile-container").classList.remove("show");


    //hide waiting page
    document.getElementById("waiting-container").classList.remove("show");
    document.getElementById("community-page").classList.remove("show");

    //hide shop page
     document.getElementById("shop-container").classList.remove("show");
     document.getElementById("shop-page").classList.remove("here");
}