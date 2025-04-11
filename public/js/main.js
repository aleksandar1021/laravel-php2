let url = window.location.pathname
let csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

if(url.indexOf("/contact") != -1){

    let sendButton = document.getElementById("send")

    sendButton.addEventListener("click", function(){
        submitForm()
    })
    function validateForm() {

        document.getElementById("errors").html = "";
        document.getElementById("success").html =""

        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let message = document.getElementById('message').value;
        let namePattern = /^[a-zA-Z]+ [a-zA-Z]+$/;
        let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        let errorInput = document.getElementById('errors');

        let errors = "";

        if (!namePattern.test(name)) {
            errors+='Please enter a valid name (Aleksandar Kandic)<br>'
        }

        if (!emailPattern.test(email)) {
            errors+='Please enter a valid email address<br>'
        }

        if (message.length > 200 || message.length < 10) {
            errors+='Message must not exceed 200 and less than 10 characters<br>'
        }


        if(errors.length){
            errorInput.innerHTML = errors
            return false;
        }else{
            errorInput.innerHTML = ""
        }

        return true;
    }

    function submitForm() {
        if (!validateForm()) {
            return false;
        }

        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let message = document.getElementById('message').value;

        let csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;


        let formData = new FormData();
        formData.append('_token', csrfToken);
        formData.append('name', name);
        formData.append('email', email);
        formData.append('message', message);

        document.getElementById("contactForm").reset();


        fetch('/contact', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN':csrfToken
            },
            body: formData

        }).then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.message === 'Network error') {
                    document.getElementById("success").innerHTML = "";
                    document.getElementById("errors").innerText = data.message;
                } else {
                    document.getElementById("success").innerHTML = data.message;
                    document.getElementById("errors").innerText = "";
                }
            })

        return false;
    }


}

if(url=="/"){


    document.getElementById("news").addEventListener("click", function() {
        let email = document.getElementById("email").value;
        let isValidEmail = validateEmail(email);

        let csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;


        if (isValidEmail) {
            fetch('/newsletter', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ email: email, _token: csrfToken })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                }).then(data => {
                    if (data.message === 'Email already exists') {
                        document.getElementById("error2").innerText = data.message;
                        document.getElementById("success2").innerText = "";
                    } else {
                        document.getElementById("error2").innerText = "";
                        document.getElementById("success2").innerText = data.message;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        } else {
            document.getElementById("success2").innerText = "";

            document.getElementById("error2").innerText = "Please enter a valid email address";
        }
    });

    function validateEmail(email) {
        let re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    document.getElementById("comment").addEventListener("click", function() {

        let subject = document.getElementById("subject").value;
        let message = document.getElementById("message").value;

        let csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

        let errors = false;

        let errorsString = ""

        if(subject.length < 3){
            errors = true
            errorsString+="The title must not be less than 3 characters<br>"
        }

        if(subject.length>50){
            errors = true
            errorsString+="The title must not be longer than 50 characters<br>"
        }

        if(message.length < 5){
            errors = true
            errorsString+="The title must not be less than 5 characters<br>"
        }

        if(message.length > 150){
            errors = true
            errorsString+="The title must not be longer than 150 characters<br>"
        }

        if(!errors) {

            fetch('/comment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ subject: subject, message: message, _token: csrfToken })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                }).then(data => {
                if (data.message === 'Email already exists') {
                    document.getElementById("error").innerText = data.message;
                    document.getElementById("success").innerText = "";
                } else {
                    document.getElementById("error").innerText = "";
                    document.getElementById("success").innerText = data.message;
                }
            })
                .catch(error => {
                    //console.error('Error:', error);
                });
        } else {
            document.getElementById("success").innerHTML = "";

            document.getElementById("error").innerHTML = errorsString;
        }
    });
}

if(url=="/gallery" || url.indexOf("/galleryFilter")!=-1) {

    window.addEventListener('beforeunload', function() {
        localStorage.setItem('scrollPosition', window.scrollY);
    });


    window.addEventListener('load', function() {
        var scrollPosition = localStorage.getItem('scrollPosition');
        if (scrollPosition !== null) {
            setTimeout(function() {
                window.scrollTo(0, scrollPosition);
            }, 0.1);
            localStorage.removeItem('scrollPosition');
        }
    });

    document.getElementById('cat').addEventListener('change', function() {
        document.getElementById('form1').submit();
    });
}
if(url.indexOf("/reservation")!=-1) {

    function reservate(button, id, image, name){
        var card = $(button).closest('.reservationCard');
        var start = card.find('.start-date').val();
        var end = card.find('.end-date').val();

        //console.log(start)
        $.ajax({
            url: '/reserve',
            type: 'PATCH',
            data: { start: start, end: end, id_table: id, image: image, name: name, _token: csrfToken},
            success: function(response) {
                modal.style.display = "block";
                let errors = ''
                if(response.errors){
                    for(let err of response.errors){
                        errors+=err
                    }
                }
                $('#modalContent').html(errors)
                //console.log(response.errors)
            },
            error: function(xhr, status, error) {
            }
        });
    }


    window.onload = function() {

        $.ajax({
            url: "/tables",
            method : "GET",
            dataType: "json",
            success: function(data){
                printTables(data.original)
            },
            error: function(){

            }

        })
        $(document).on('click', '.reserveButton', function() {
            let id = $(this).data('id')
            let image = $(this).data('image')
            let name = $(this).data('name')
            reservate(this, id, image, name)
        });
    };



    $('input[type="checkbox"]').change(function() {
        filter()
    });

    $('#sort').change(function() {
        filter()
    });

    $('#searchReservation').keyup(function(event) {
        filter()
    });


    function filter() {
        let search = $('#searchReservation').val()
        let sort = $('#sort').val();

        var checkedPremiumCheckboxes = $('.premium:checked');
        var premiumValues = [];

        var checkedNumbers = $('.numberChairs:checked');
        var numbersValues = [];

        checkedPremiumCheckboxes.each(function() {
            premiumValues.push($(this).val());
        });

        checkedNumbers.each(function() {
            numbersValues.push($(this).val());
        });

        //console.log(premiumValues)

        $.ajax({
            url: '/tables',
            type: 'GET',
            data: { premiumCategory: premiumValues, numberCategory: numbersValues, search: search, sort: sort},
            success: function(data) {
                printTables(data.original)
                //console.log(data.original)
            },
            error: function(xhr, status, error) {
            }
        });
    }

    function printTables(tables) {
        let output = '';
        if(tables.length){
            tables.forEach(function(t) {
                output += `
            <div class="reservationCard flex">
                <div class="resImage">
                    <img src="images/tables/${t.image}">
                </div>
                <div class="content card">
                    <h2 class="naslov2">Premium level od table:</h2>
                    <p>${t.premium_level.name}</p>
                    <div class="flex chairs">
                        <h2 class="naslov2">Number of chairs:</h2>&nbsp;
                        <p>${t.chair_numbers.number}</p>
                    </div>
                    <h2 class="naslov2">Choose a date and time:</h2>
                    <input type="datetime-local" class="meeting-time start-date" id="startDate" name="meeting-time" min="${new Date().toISOString().slice(0, 16)}">&nbsp;
                    <input type="datetime-local" class="meeting-time end-date" id="endDate" name="meeting-time" min="${new Date().toISOString().slice(0, 16)}">&nbsp;
                    <input class="buttonCustom reserveButton" data-image="${t.image}" data-name="${t.name}" data-id="${t.id}" type="button" id="reservate" value="RESERVE">&nbsp;
                    <h2 class="naslov2">Description:</h2>
                    <p>${t.name}: ${t.description}</p>
                </div>
            </div>
        `;
            });
        }else{
            output = `<div class="alert alert-danger alertReservation" role="alert">
                            There are no results for the entered search
                      </div>`;
        }
        document.getElementById('tables').innerHTML = output;
    }

}

// modal
let modal = document.getElementById("myModal");


var span = document.getElementsByClassName("close")[0];

span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


if(url.indexOf("/checkout")!=-1) {

    $('#reservateAll').click(function(){

        $.ajax({
            url: `/reservateAll`,
            method: "POST",
            data : {_token: csrfToken},
            success: function(data){
                $('#modalContent').html(data)
                modal.style.display = "block";
                $("#ttt").html(`<div class="alert alert-danger alertReservation" role="alert">
                                       There are currently no reservations, please make a reservation on the reservation page
                              </div>`)
                $(this).remove()
            },
            error: function(){
                $('#modalContent').html(data)
                modal.style.display = "block";
            }
        })
    })


    $('.removeBtn').click(function(e){
        e.preventDefault()
        let id = $(this).data("id")
        removeReservation(id, this)
    })

    function removeReservation(id, button){
        $.ajax({
            url: `/removeReservationUser/${id}`,
            method: "DELETE",
            data : {_token: csrfToken},
            success: function(data){
                button.closest('tr').remove()
                if(!data){
                    $("#ttt").html(`<div class="alert alert-danger alertReservation" role="alert">
                                       There are currently no reservations, please make a reservation on the reservation page
                              </div>`)
                }
            },
            error: function(){

            }
        })
    }
}
