// function checkCode() {
//     var tag = $('#discount-code');
//     var code = tag.val();
//     var url = 'checkout/checkCode';
//     alert(url);
//     var data = {'_token': '{{csrf_token()}}','code': code};
//     $.post(url, data, function(msg) {
//         console.log(msg);
//         if (msg[0] != 0) {
//             tag.addClass('green');
//         } else {
//             tag.addClass('red');
//         }
//         alert(msg[0]);
//         $('#totalprice').html(msg[1]);
//     }, 'json');
// }

// function calculateTotalPrice() {
//     var url = 'checkout/calculatetotalprice';
//     var tag = $('#discount-code');
//     var code = tag.val();
//     var data = {'_token': '{{csrf_token()}}','code': code};
//     $.post(url, data, function(msg) {
//         $('#totalprice').text(msg);
//     })
// }
// calculateTotalPrice();