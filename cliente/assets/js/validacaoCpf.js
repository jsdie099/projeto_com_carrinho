$("#btn").on('click',function (e) {

    function TestaCPF(strCPF) {
        var Soma;
        var Resto;
        Soma = 0;
        if (strCPF == "00000000000") return false;

        for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11))  Resto = 0;
        if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;

        Soma = 0;
        for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11))  Resto = 0;
        if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
        return true;
    }
    cpf = document.getElementById("cpf").value;
    let stringCpf = (cpf.split("").filter(n=>Number(n) || n==0).join(""));
    if(TestaCPF(stringCpf))
    {
        document.getElementById("erro").innerHTML = '';
    }
    else
    {
        e.preventDefault();
        document.getElementById("erro").innerHTML = '<h1>CPF inválido!';
    }
});
