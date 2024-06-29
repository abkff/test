const inputs = document.querySelectorAll('.suppressButton')
    const confirmButton = document.getElementById('confirm')
    var inputValue = 0;
    var redirectUrl = "";

    inputs.forEach(button => {
        button.addEventListener("click", function(){
            inputValue = this.value;
        });
    });

    confirmButton.addEventListener("click", function(){
        redirectUrl = '?&action=delete&id=' + inputValue;
        if(redirectUrl != ''){
        window.location.href = redirectUrl;
    }
    });
