<script src="https://cdn.tailwindcss.com"></script>

<div class="ue_container_register_form" id="ue_container_register_form">
    <div class="">
        <img class="object-cover object-center w-full h-[150px]" src="<?= $basePath ?>assets/banner.jpg" alt="">
    </div>
    <div class="flex flex-col justify-center items-center gap-3 py-3">
        <a href="<?= $basePath ?>docs/BASES-VII-CEDE-ESAN-2023-VF.pdf" target="_blank">
            <div class="flex justify-center gap-2.5">
                <h5 class="font-semibold text-[#4A494A] hover:border-b hover:border-b-[#e3173e]">Bases del campeonato</h5>
                <div class="flex px-[5px] py-px rounded-[50px] border-2 border-solid border-[#e3173e]">
                    <i class="fa-solid fa-arrow-down h-5 flex justify-center text-[#e3173e] items-center"></i>
                </div>
            </div>
        </a>
        <div class="px-5 sm:px-16 mx-4 sm:mx-0 flex flex-col gap-7 border border-solid border-[#EBEBEB] w-auto sm:w-[700px]">
            <h1 class=" pt-5 font-bold text-xl uppercase text-center">Ficha de registro</h1>
            <div class="">
                <div class="px-8 py-1 rounded-xl bg-[#e3173e]">
                    <h2 class="font-bold text-base uppercase text-white">Datos del Juez</h2>
                </div>
                <?php include 'formulario_juez.php'; ?>
            </div>
            <div class="pb-4">
                <div class="flex flex-col gap-2 mx-5 text-sm">
                    <div class="relative flex gap-2 justify-start items-start">
                        <input id="procedenciahidden" name="procedenciahidden" type="hidden">
                        <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                        <input class="authorizationCheckId" type="checkbox" id="acceptDataPolicy" onclick="fnValidateInput(this)">
                        <a href="https://www.ue.edu.pe/pregrado/politica-de-privacidad" target="__blank">
                            <p class="text-[#e3173e] font-semibold -mt-1 hover:border-b hover:border-b-[#e3173e]">Acepto las condiciones de tratamiento para mis
                                datos personales</p>
                        </a>
                    </div>
                    <div class="flex justify-start items-start gap-2">
                        <input class="authorizationCheckId" type="checkbox" id="authorizeDataUsage">
                        <p class="-mt-1 text-justify">
                            Autorizo a UESAN a utilizar mis datos para el envío de publicidad sobre los servicios
                            educativos y actividades que brinda, así como la realización de encuestas de satisfacción
                            al cliente.
                        </p>
                    </div>
                    <div class="flex justify-end ">
                        <button class=" bg-[#e3173e] text-white px-4 py-3 disabled:cursor-not-allowed disabled:text-black disabled:bg-[#DBDBDB]" id="btn-save-judge" onclick="fnRegisterJudge()" disabled>
                            Enviar Datos
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../jquery-3.7.1.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js?render=6LebI98aAAAAAIFmLk_nQrn-v0COUf5ruzjZS3px'></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6LebI98aAAAAAIFmLk_nQrn-v0COUf5ruzjZS3px', {
                action: 'formulario'
            })
            .then(function(token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;

                if (procedencia_hasta_ahora != null) {
                    document.querySelector("#procedenciahidden").value = procedencia_hasta_ahora;
                }

            });
    });
</script>
<script>
    const btnSaveJugde = document.getElementById("btn-save-judge");
    const btnAuthorizeDataUsage = document.getElementById("authorizeDataUsage");
    let inputCookie = document.getElementById("procedenciahidden");
    const data = {};

    var misCookies = document.cookie;
    listaCookies = misCookies.split(";");

    /* Start Cookie */

    function getCookie(name) {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length == 2) return parts.pop().split(";").shift();
    }

    function addTrafficSourceToForm() {
        var elValorDeLaProcedencia = getCookie("traffic_source");
        $("#procedenciahidden").val(elValorDeLaProcedencia);
    }

    $('form#fsForm2317828 input').focus(function() {
        addTrafficSourceToForm();
    });

    for (i in listaCookies) {
        var vreff = listaCookies[i].substring(0, 15);
        if (vreff.trim() == "traffic_source") {
            document.f1.cookdatos.value = listaCookies[i].slice(16);
        }
    }

    /* End Cookie */

    function fnRegisterJudge() {
        inputId.forEach(element => {
            const input = document.getElementById(element);
            let value = input.value;
            if (element === "acceptDataPolicy") value = input.checked;
            if (element === "independentOrInstitution") value = independentOrInstitution;
            data[element] = value;
        });
        if (procedencia_hasta_ahora != null) document.querySelector("#procedenciahidden").value = procedencia_hasta_ahora;
        data.authorizeDataUsage = btnAuthorizeDataUsage.checked;
        data.cookie = inputCookie.value;
        console.log("Registrar Jueces");

        $.ajax({
            url: "src/services/register.php",
            type: "POST",
            data: JSON.stringify(data),
            contentType: "application/json",
            success: function(response) {
                console.log("Respuesta recibida:", response);
                alert('Tus datos han sido registrados con éxito.');
            },
            error: function(error) {
                console.error("Error en la solicitud:", error);
            }
        });
        // $.ajax({
        //     url: "src/services/test.php",
        //     type: "POST",
        //     data: JSON.stringify(data),
        //     contentType: "application/json",
        //     success: function(response) {
        //         alert('Tus datos han sido registrados con éxito.');
        //         // window.location.href = 'https://ue.edu.pe/pregrado/gracias-jueces-campeonato';
        //     },
        //     error: function(error) {
        //         console.error("Error en la solicitud:", error);
        //     }
        // });
    }
</script>