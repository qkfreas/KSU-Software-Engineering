/**
 * Created by qkfre on 3/1/2017.
 */
function pass_word() {
    var password = 'password';

    if (this.document.submit.pass.value == password) {
        top.location.href="deals.html";
    }
    else {
        window.alert("Incorrect password, please try again.");
    }
}
