<div class="ue_container_register_form" id="ue_container_register_form">
    <div class="">
        <img class="object-cover object-center w-full h-[150px]" src="<?= $basePath ?>assets/banner.jpg" alt="">
    </div>
    <div class="flex flex-col justify-center items-center gap-3 py-3">
        <a href="<?= $basePath ?>docs/BASES-VII-CEDE-ESAN-2023-VF.pdf" target="_blank">
            <div class="flex justify-center gap-2.5">
                <h5 class="font-semibold text-[#4A494A] hover:border-b hover:border-b-[#FF103D]">Bases del campeonato</h5>
                <div class="flex px-[5px] py-px rounded-[50px] border-2 border-solid border-[#FF103D]">
                    <i class="fa-solid fa-arrow-down h-5 flex justify-center text-[#FF103D] items-center"></i>
                </div>
            </div>
        </a>
        <div class=" px-16 flex flex-col gap-7 border border-solid border-[#EBEBEB] w-full lg:w-[700px]">
            <h1 class=" pt-5 font-bold text-xl uppercase text-center">Ficha de registro</h1>
            <div class="">
                <div class="px-8 py-1 rounded-xl bg-[#FF103D]">
                    <h2 class="font-bold text-base uppercase text-white">Datos del Juez</h2>
                </div>
                <?php include 'formulario_juez.php'; ?>
            </div>
            <div class="pb-4">
                <div class="flex flex-col gap-2 mx-5 text-sm">
                    <div class="flex gap-2 justify-start items-start">
                        <input class="authorizationCheckId" type="checkbox" id="acceptDataPolicy" onclick="fnValidateInput(this)">
                        <a href="https://www.ue.edu.pe/pregrado/politica-de-privacidad" target="__blank">
                            <p class="text-[#FF103D] font-semibold -mt-1 hover:border-b hover:border-b-[#FF103D]">Acepto las condiciones de tratamiento para mis
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
                        <button class="bg-[#DBDBDB] px-4 py-3 disabled:cursor-not-allowed" id="btn-save-judge" onclick="fnRegisterJudge()" disabled>
                            Enviar Datos
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const btnSaveJugde = document.getElementById("btn-save-judge");
    const btnAuthorizeDataUsage = document.getElementById("authorizeDataUsage");
    const data = {};

    function fnRegisterJudge() {
        console.log(inputId);
        inputId.forEach(element => {

            const input = document.getElementById(element);
            console.log(element, input);
            let value = input.value;
            if (element === "acceptDataPolicy") value = input.checked;
            data[element] = value;
        });

        data.authorizeDataUsage = btnAuthorizeDataUsage.checked;
        console.log(data);

    }
</script>

