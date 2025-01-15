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
        <div class=" px-16 flex flex-col gap-7 border border-solid border-[#EBEBEB] w-[700px]">
            <h1 class=" pt-5 font-bold text-xl uppercase text-center">Ficha de registro</h1>
            <div class="">
                <div class="px-8 py-1 rounded-xl bg-[#FF103D]">
                    <h2 class="font-bold text-base uppercase text-white">Datos de la institución</h2>
                </div>
                <div class="pt-7 grid grid-cols-2 gap-x-10 gap-y-8">
                    <input class="border-b border-solid border-b-black focus:outline-none py-2" onkeyup="fnActiveOrDeactivateBtnSendDataTeam(this.value.length >= 3,this)" type="text"
                        placeholder="Nombre del colegio" id="schoolName">
                    <select class="border-b border-solid border-b-black focus:outline-none py-2" id="department" onchange="fnActiveOrDeactivateBtnSendDataTeam(this.value.length >= 3,this)">
                        <option value="">Selecciona un departamento</option>
                        <option value="lima">Lima</option>
                        <option value="arequipa">Arequipa</option>
                    </select>
                    <select class="border-b border-solid border-b-black focus:outline-none py-2" id="province" onchange="fnActiveOrDeactivateBtnSendDataTeam(this.value.length >= 3,this)">
                        <option value="">Selecciona una provincia</option>
                        <option value="lima">Lima</option>
                        <option value="huaral">Huaral</option>
                    </select>
                    <select class="border-b border-solid border-b-black focus:outline-none py-2" id="district" onchange="fnActiveOrDeactivateBtnSendDataTeam(this.value.length >= 3,this)">
                        <option value="">Selecciona un distrito</option>
                        <option value="lurigancho">Lurigancho</option>
                        <option value="sjl">San Juan de Lurigancho</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <div class="px-8 py-1 rounded-xl bg-[#FF103D]">
                    <h2 class="font-bold text-base uppercase text-white">Datos del equipo</h2>
                </div>
                <button id="btn-add-speaker" class="flex align-middle items-center gap-1 disabled:cursor-not-allowed"
                    onclick="fnDefineParticipantType(0);fnShowModal();setTitleModal('Añadir Orador');activateButtonAddSpeaker();">
                    <i class="fa-solid fa-circle-plus text-[#FF103D] text-base"></i>
                    <h5>Añadir orador</h5>
                </button>
                <div class="flex flex-col gap-3" id="speakers-container">
                </div>
                <button id="btn-add-teacher" class="flex align-middle items-center gap-1 disabled:cursor-not-allowed"
                    onclick="fnDefineParticipantType(1);fnShowModal();setTitleModal('Añadir profesor responsable');activateButtonAddSpeaker();">
                    <i class="fa-solid fa-circle-plus text-[#FF103D] text-base"></i>
                    <h5>Añadir profesor responsable</h5>
                </button>
                <div class="flex flex-col gap-3" id="teacher-container">
                </div>
            </div>
            <div class="pb-4">
                <div class="flex flex-col gap-1 border border-solid border-black text-center text-sm p-1">
                    <p>
                        Para poder utilizar las fotografias y videos en los que participes, por favor descarga este
                        Consentimiento para el tratamiento
                        de Datos Personales y Acuerdo de Uso de Imagen y adjúntalo en el formulario.
                    </p>
                    <a href="<?= $basePath ?>docs/Consentimiento-de-menores-de-edad-Debate-2023.docx">
                        <span class="hover:border-b hover:border-b-[#FF103D] text-[#FF103D] font-bold">*Formato para participantes*</span>
                    </a>
                    <a class="" href="<?= $basePath ?>docs/Consentimiento-para-el-tratamiento-de-Datos-Personales-y-Acuerdo-de-Uso-de-Imagen-R1.docx">
                        <span class="text-[#FF103D] font-bold hover:border-b hover:border-b-[#FF103D]">*Formato para profesores responsables*</span>
                    </a>
                </div>
                <div class="flex flex-col gap-2 pt-10 mx-5 text-sm">
                    <div class="flex gap-2 justify-start items-start">
                        <input class="authorizationCheckId" type="checkbox" id="check1" onclick="fnActiveOrDeactivateBtnSendDataTeam(this.checked,this)">
                        <a href="https://www.ue.edu.pe/pregrado/politica-de-privacidad" target="__blank">
                            <p class="text-[#FF103D] font-semibold -mt-1 hover:border-b hover:border-b-[#FF103D]">Acepto las condiciones de tratamiento para mis
                                datos personales</p>
                        </a>
                    </div>
                    <div class="flex justify-start items-start gap-2">
                        <input class="authorizationCheckId" type="checkbox" id="check2">
                        <p class="-mt-1 text-justify">
                            Autorizo a UESAN a utilizar mis datos para el envío de publicidad sobre los servicios
                            educativos y actividades que brinda, así como la realización de encuestas de satisfacción
                            al cliente.
                        </p>
                    </div>
                    <div class="flex justify-end ">
                        <button class="bg-[#DBDBDB] px-4 py-3 disabled:cursor-not-allowed" id="btn-save-team" onclick="fnTeamRegister()" disabled>
                            Enviar Datos
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>