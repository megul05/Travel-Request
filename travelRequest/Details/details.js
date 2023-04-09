let auth_token;
$(document).ready(function () {
    $.ajax({
        type: 'get',
        url: 'https://www.universal-tutorial.com/api/getaccesstoken',

        success: function (data) {
            auth_token = data.auth_token
            getCountry(data.auth_token);
            getCityF();


        },
        error: function (error) {
            console.log(error);
        },
        headers: {
            "Accept": "application/json",
            "api-token": "hydJeF7HNFW_6dtTSdzM_HfHzN-lBIZc2GaVjnR8Rvogh9PcWU_jI13NwUSQdvomfIA",
            "user-email": "hihello@gmail.com"

        }
    })

    $('#countryS').change(function () {
        getState();
    })

    $('#stateS').change(function () {
        getCity();
    })
})


function getCountry(auth_token) {
    $.ajax({
        type: 'get',
        url: 'https://www.universal-tutorial.com/api/countries/',
        success: function (data) {
            data.forEach(Element => {
                $('#countryS').append('<option value="' + Element.country_name + '">' + Element.country_name + '</option>');
            })
            // console.log(data);
            // getState(auth_token)
        },
        error: function (error) {
            // console.log(error);
        },
        headers: {
            "Authorization": "Bearer " + auth_token,
            "Accept": "application/json"
        }
    })
}

function getState() {
    let country_name = $('#countryS').val();
    $.ajax({
        type: 'get',
        url: 'https://www.universal-tutorial.com/api/states/' + country_name,
        success: function (data) {
            $('#stateS').empty();

            data.forEach(Element => {

                console.log(Element)
                $('#stateS').append('<option value="' + Element.state_name + '">' + Element.state_name + '</option>');
            })
            getCity(auth_token);
        },
        error: function (error) {
            console.log(error);
        },
        headers: {
            "Authorization": "Bearer " + auth_token,
            "Accept": "application/json"
        }
    })
}

function getCity() {
    let state_name = $('#stateS').val();
    $.ajax({
        type: 'get',
        url: 'https://www.universal-tutorial.com/api/cities/' + state_name,
        success: function (data) {
            $('#toCityS').empty();

            data.forEach(Element => {
                $('#toCityS').append('<option value="' + Element.city_name + '">' + Element.city_name + '</option>');
            })
        },
        error: function (error) {
            console.log(error);
            console.log(state_name)

        },
        headers: {
            "Authorization": "Bearer " + auth_token,
            "Accept": "application/json"
        }
    })
}

function getCityF() {
    let state_name = 'Tamil Nadu';
    $.ajax({
        type: 'get',
        url: 'https://www.universal-tutorial.com/api/cities/' + state_name,
        success: function (data) {
            console.log("HI");
            $('#fromCityS').empty();

            data.forEach(Element => {
                $('#fromCityS').append('<option value="' + Element.city_name + '">' + Element.city_name + '</option>');
            })
        },
        error: function (error) {
            console.log(error);
        },
        headers: {
            "Authorization": "Bearer " + auth_token,
            "Accept": "application/json"
        }
    })
}
