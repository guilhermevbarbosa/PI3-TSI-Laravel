window.onload = function() {
    $(".cep").mask("00000-000");
};

function getCep(cepVal) {
    cepVal = cepVal.replace("-", "");

    if (cepVal.length === 8) {
        fetchCepData(cepVal);
    }
}

function fetchCepData(cep) {
    var ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let cepResponse = JSON.parse(this.response);

            if (cepResponse.erro) {
                $("#error-cep").css("display", "block");
                $("#save").attr("disabled", "disabled");
            } else {
                $("#error-cep").css("display", "none");
                $("#save").removeAttr("disabled");

                $("#address").val(cepResponse.logradouro);
                $("#neig").val(cepResponse.bairro);
                $("#city").val(cepResponse.localidade);
                $("#state").val(cepResponse.uf);
            }
        }
    };

    ajax.open("GET", `https://viacep.com.br/ws/${cep}/json/`, true);
    ajax.send();
}
