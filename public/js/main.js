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

function ajaxSubmitBlog(form, id=null) {
    $(document).ready(function() {
        var formId = '#' + form;
        if ($(formId).length) {
            console.log(formId + " existed");
        }
        else {
            console.log(formId + " MISSING");
        }
        $(formId).on("submit", function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "http://localhost/CupidDate/blog/" + form,
                data: $(formId).serializeArray(),
                success: function(data) {
                    console.log(data);
                    if (form === "addcomment") {
                        if ($("textarea#comment-textbox").val() === '')
                            $("#text-danger").text('Please fill out this field.')
                        else {
                            $("textarea#comment-textbox").val('');
                            getCommentList(id);
                        }
                    }

                }
            });
        })

    }); 
}

function ajaxSubmitMessage(form, id=null) {
    $(document).ready(function() {
        var formId = '#' + form;
        if ($(formId).length) {
            console.log(formId + " existed");
        }
        else {
            console.log(formId + " MISSING");
        }
        $(formId).on("submit", function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "http://localhost/CupidDate/messages/" + form,
                data: $(formId).serializeArray(),
                success: function(data) {
                    console.log(data);
                    if (form === "addmessage") {
                        if ($("#message-textbox").val() != '') {
                            $("#message-textbox").val('');
                            getChatList(id);
                        }
                    }

                }
            });
        })

    }); 
}

// get comment list in a post
function getCommentList(postId) {
    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: "../getcomments/" + postId,
            success: function(data) {
                console.log(data);
                $('#comment-list').html(data);
            }
        });
    });
}

function getChatList(userId) {
    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: "../getchatlist/" + userId,
            success: function(data) {
                console.log(data);
                $("#chat-box").html(data);
            }
        });
    });
}

function initMap() {
    // The location of Uluru
    const hcm = { lat: 10.8685, lng: 106.7964 };
    // The map, centered at Uluru
    const map = new google.maps.Map(
      document.getElementById("map"), 
      {
        zoom: 10,
        center: hcm,
      }
    );
    const marker = new google.maps.Marker({
        position: hcm,
        map: map,
      });
}

//set up profile
function openSetup() {
    document.getElementById("setup__step-1").classList.remove("show");    
    document.getElementById("setup__step-0").classList.add("show");
}

function openFirstStep() {
    document.getElementById("setup__step-0").classList.remove("show"); 
    document.getElementById("setup__step-2").classList.remove("show");    
    document.getElementById("setup__step-1").classList.add("show");
}

function openSecondStep() {
    if($('#country').val() == "") {
        document.getElementById('countryError').style.color = "red";
    } else if($('#state').val() == "") {
        document.getElementById('stateError').style.color = "red";
    } else if($('#city').val() == "") {
        document.getElementById('cityError').style.color = "red";
    } else {
        document.getElementById("setup__step-1").classList.remove("show");    
        document.getElementById("setup__step-3").classList.remove("show");    
        document.getElementById("setup__step-2").classList.add("show");
    }
}

function openThirdStep() {
    document.getElementById("setup__step-2").classList.remove("show");    
    document.getElementById("setup__step-4").classList.remove("show");    
    document.getElementById("setup__step-3").classList.add("show");
}

function openFourthStep() {
    document.getElementById("setup__step-5").classList.remove("show");    
    document.getElementById("setup__step-3").classList.remove("show");    
    document.getElementById("setup__step-4").classList.add("show");
}

function openFifthStep() {
    document.getElementById("setup__step-4").classList.remove("show");    
    document.getElementById("setup__step-6").classList.remove("show");    
    document.getElementById("setup__step-5").classList.add("show");
}

function openSixStep() {
    document.getElementById("setup__step-5").classList.remove("show");    
    document.getElementById("setup__step-7").classList.remove("show");    
    document.getElementById("setup__step-6").classList.add("show");
}

function openSevenStep() {
    document.getElementById("setup__step-6").classList.remove("show");    
    document.getElementById("setup__step-8").classList.remove("show");    
    document.getElementById("setup__step-7").classList.add("show");
}

function openEightStep() {
    document.getElementById("setup__step-7").classList.remove("show");    
    document.getElementById("setup__step-8").classList.add("show");
}

function openNineStep() {
    document.getElementById("setup__step-8").classList.remove("show");    
    document.getElementById("setup__step-9").classList.add("show");
}
function openTenStep() {
    document.getElementById("setup__step-9").classList.remove("show");    
    document.getElementById("setup__step-10").classList.add("show");
    document.getElementById("setup__step-11").classList.remove("show");
}

    
//submit form with ajax
$(document).ready(function() {
    $('#country').change(function() {
        var country_id = $('#country').val();
        if(country_id != '') {
            var url = '../users/fetch_state';
            $.ajax({
                url:url,
                method: 'POST',
                data: {country_id:country_id},
                success:function(data) {
                    $('#state').html(data);
                },
                error:function() {
                    alert('error!!');
                }
            });
        }
    })

    $('#state').change(function() {
        var state_id = $('#state').val();
        if(state_id != '') {
            var url = '.././users/fetch_city';
            $.ajax({
                url:url,
                method: 'POST',
                data: {state_id:state_id},
                success:function(data) {
                    $('#city').html(data);
                },
                error:function() {
                    alert('error!!');
                }
            });
        }
    })

    $('#city').change(function() {
        var city_id = $('#city').val();
        if(city_id != '') {
            var url = '.././users/fetch_city';
            $.ajax({
                url:url,
                method: 'POST',
                data: {city_id:city_id}
            });
        }
    })
})

$(document).ready(function() {
    $('form.job-form').on('submit', function() {
        var that = $(this),
            url = that.attr('action'),
            type = that.attr('method'),
            job = $('#job').val();
            data = {job: job};
        console.log(data);
        $.ajax({
            url: url,
            type: type,
            data: data,
            success:function(response) {
                console.log(response);
            }
        });
        return false;
    })
})

//add income
$(document).ready(function() {
    $('form.income-form').on('submit', function() {
        var that = $(this),
            url = that.attr('action'),
            type = that.attr('method'),
            income = $('#income').val();
            data = {income: income};
        console.log(data);
        $.ajax({
            url: url,
            type: type,
            data: data,
            success:function(response) {
                console.log(response);
            }
        });
        return false;
    })
})

//add marital status
$(document).ready(function() {
    $('form.status-form').on('submit', function() {
        var that = $(this),
            url = that.attr('action'),
            type = that.attr('method'),
            status = $('#status').val();
            data = {status: status};
        console.log(data);
        $.ajax({
            url: url,
            type: type,
            data: data,
            success:function(response) {
                console.log(response);
            }
        });
        return false;
    })
})

//add get married time
$(document).ready(function() {
    $('form.get-married-form').on('submit', function() {
        var that = $(this),
            url = that.attr('action'),
            type = that.attr('method'),
            getMarried = $('#getMarried').val();
            data = {getMarried: getMarried};
        console.log(data);
        $.ajax({
            url: url,
            type: type,
            data: data,
            success:function(response) {
                console.log(response);
            }
        });
        return false;
    })
})

//add stimulants
$(document).ready(function() {
    $('form.stimulants-form').on('submit', function() {
        var that = $(this),
            url = that.attr('action'),
            type = that.attr('method'),
            alcohol = $('#alcohol').val();
            cigarettes = $('#cigarettes').val();
            data = {alcohol: alcohol, cigarettes: cigarettes};
        console.log(data);
        $.ajax({
            url: url,
            type: type,
            data: data,
            success:function(response) {
                console.log(response);
            }
        });
        return false;
    })
})

//add days off
$(document).ready(function() {
    $('form.dayoff-form').on('submit', function() {
        var that = $(this),
            url = that.attr('action'),
            type = that.attr('method'),
            dayoff = $('#dayoff').val();
            data = {dayoff: dayoff};
        console.log(data);
        $.ajax({
            url: url,
            type: type,
            data: data,
            success:function(response) {
                console.log(response);
            }
        });
        return false;
    })
})

//add some describe
$(document).ready(function() {
    $('form.about-form').on('submit', function() {
        var that = $(this),
            url = that.attr('action'),
            type = that.attr('method'),
            user_about = $('#user_about').val();
            data = {user_about: user_about};
        console.log(data);
        $.ajax({
            url: url,
            type: type,
            data: data,
            success:function(response) {
                console.log(response);
            }
        });
        return false;
    })
})

//add some character
$(document).ready(function() {
    $('form.character-form').on('submit', function() {
        var that = $(this),
            url = that.attr('action'),
            type = that.attr('method'),
            user_character = $('#user_character').val();
            data = {user_character: user_character};
        console.log(data);
        $.ajax({
            url: url,
            type: type,
            data: data,
            success:function(response) {
                console.log(response);
            }
        });
        return false;
    })
})

//set avt
function triggerClick() {
    document.querySelector('#avatar').click();
}

function displayImage(e) {
    if(e.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            console.log(e.target.result);
            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);    
    }
}

//add photos
function openAddPhotoForm() {
    document.querySelector('#form-container-photo').style.display="flex";
    document.querySelector('#overlay_invisible').style.display="block";
}

function closeForm() {
    document.querySelector('.form-container').style.display="none";
    document.querySelector('#open-avt').style.display='none';
    document.querySelector('#overlay_invisible').style.display="none";
    document.querySelector('#change-avt').style.display = 'none';
    document.querySelector('#open-photo').style.display='none';
}

function phototriggerClick() {
    event.preventDefault();
    document.querySelector('#photo').click();
}

function displayPhoto(e) {
    if(e.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            console.log(e.target.result);
            document.querySelector('.suggestion').style.display="none";
            document.querySelector('.add_photo-form-submit').style.display="block";
            document.querySelector('#photo_upload').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);    
    }
}

function openPhoto(src) {
    document.querySelector('#overlay_invisible').style.display="block";
    document.querySelector('#open-photo').style.display="block";
    document.querySelector('#open-photo__img').setAttribute('src', src);
}

function openAvt(src) {
    document.querySelector('#overlay_invisible').style.display="block";
    document.querySelector('#open-avt').style.display="block";
    document.querySelector('#open-avt__img').setAttribute('src', src);
}

//change avt
function openChangeAvatar() {
    document.querySelector('#overlay_invisible').style.display = 'block';
    document.querySelector('#change-avt').style.display = 'flex';
}
function avttriggerClick() {
    event.preventDefault();
    document.querySelector('#avt').click();
}

function displayAvt(e) {
    if(e.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            console.log(e.target.result);
            document.querySelector('.uploaded-photos').style.display="none";
            document.querySelector('.change-avt__button').style.display="none";
            document.querySelector('.change-avt-submit').style.display="block";
            document.querySelector('#new-avt').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);    
    }
}

function chooseAvt(src) {
    document.querySelector('.uploaded-photos').style.display="none";
    document.querySelector('.change-avt__button').style.display="none";
    document.querySelector('.change-avt-submit').style.display="block";
    document.querySelector('#new-avt').setAttribute('src', src);
}

function cancelAvatar() {
    document.querySelector('.uploaded-photos').style.display="block";
    document.querySelector('.change-avt__button').style.display="block";
    document.querySelector('.change-avt-submit').style.display="none";
}

//Like
// $(document).ready(function() {
//     $('.like').click(function() {
//         var id = $(this).attr("id");
//         document.getElementById(id).parentElement.parentElement.parentElement.parentElement.parentElement.outerHTML = "";
//     })
// })

$(document).ready(function() {
    $('.like-form').on('submit', function() {
        var that = $(this),
            user_2 = that.attr('id'),
            like = 1,
            url = that.attr('action'),
            type = that.attr('method'),
            data = {
                like: like,
                user_2: user_2
            };
        $.ajax({
            url: url,
            type: type,
            data: data,
            success:function(response) {
                console.log(response);
            }
        });
        return false;
    })
})

//seeking friends
$(document).ready(function() {
    $('form.seeking-form').on('submit', function() {
        var that = $(this),
            url = that.attr('action'),
            type = that.attr('method'),
            seeking_gender = $('#seeking_gender').val();
            from_age = $('#from_age').val();
            to_age = $('#to_age').val();
            data = {
                seeking_gender: seeking_gender,
                from_age: from_age,
                to_age: to_age
            };
        console.log(data);
        $.ajax({
            url: url,
            type: type,
            data: data,
            success:function(data) {
                $('#online-members').html(data);
            }
        });
        return false;
    })
})

