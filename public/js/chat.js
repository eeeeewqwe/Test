
$('#sendToGeneral').click(function (s) {
    var generalMessage = $('#generalMessage').val();
    var token = $('#token').val();

    $.ajax({
        method: "POST",
        url: "/home",
        cache: false,
        data: {
            message: generalMessage,
            _token: token
        }



    }).done(function( result ) {
        $('.general-body-messages').append('<p>' + generalMessage + '</p>');
    });

    setInterval(function() {$('#chatlogs').load('home');}, 5000)

});

// function submitChat(){
//     var message = homeForm.generalMessage.value;
//     var xmlhttp = new XMLHttpRequest();
//
//     xmlhttp.onreadystatechange = function() {
//         if(xmlhttp.onreadyState == 4 && xmlhttp.status == 200){
//             document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
//         }
//     }
//
//     xmlhttp.open('GET', 'home?message=' + message, true);
//     xmlhttp.send();
// }
//
// $(document).ready(function (e) {
//     $.ajaxSetup({
//         cache: false
//     })
//     // setInterval(function()  {$('#chatlogs').load('home');}, 5000)
// })






$('#sendToRoom').click(function (e) {
    var roomMessage = $('#roomMessage').val();
    var token = $('#token').val();
    var room_id = $('#room_id').val();

    $.ajax({
        method: "POST",
        url: "/chat-room",
        data: {
            message: roomMessage,
            _token: token,
            room_id: room_id
        }
    })
        .done(function (result) {
            $('.room-body-messages').append('<p>'+ roomMessage + '</p>');
        });
});