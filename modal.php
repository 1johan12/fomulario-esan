<!-- Modal -->
<div class="fixed  bg-[#00000094] justify-center items-center inset-0 flex hidden" id="ue_modal">
    <div class=" bg-white w-[500px] shadow-[rgba(0,0,0,0.25)_0px_14px_28px,rgba(0,0,0,0.22)_0px_10px_10px] flex justify-center items-center flex-col rounded-lg">
        <div class="flex justify-between w-full p-4 border-b bg-[#ff103d] border-[#e9ecef] border-solid items-center text-[1.25rem] rounded-t-lg">
            <div class="font-medium text-white">
                <h2 id="titleModal"></h2>
                <span class="hidden participantPosition"></span>
            </div>
            <button onclick="fnCloseModal()">
                <i class="fa-solid fa-xmark text-[#fff]"></i>
            </button>
        </div>
        <div class="p-7 grid grid-cols-2 w-full gap-x-4 ">
            <div class="flex flex-col relative">
                <input class="w-full border border-solid focus:outline-none rounded-lg p-2 mb-5" id="name" type="text" placeholder="Nombres" onkeyup="validateInput(this,'name-error')">
            </div>
            <div class="flex flex-col relative">
                <input class="w-full border border-solid focus:outline-none rounded-lg p-2 mb-5" id="paternalname" type="text" placeholder="Apellido paterno" onkeyup="validateInput(this,'paternalname-error')">
            </div>
            <div class="flex flex-col relative">
                <input class="w-full border border-solid focus:outline-none rounded-lg p-2 mb-5" id="maternalname" type="text" placeholder="Apellido materno" onkeyup="validateInput(this,'maternalname-error')">
            </div>
            <div class="flex flex-col relative">
                <input class="w-full border border-solid focus:outline-none rounded-lg p-2 mb-5" id="email" type="email" placeholder="E-mail" onkeyup="validateInput(this,'email-error')">
            </div>
            <div class="flex flex-col relative">
                <input class="w-full border border-solid focus:outline-none rounded-lg p-2 mb-5" id="dni" type="number" placeholder="DNI" onkeyup="validateInput(this,'dni-error')">
            </div>
            <div class=" flex flex-col relative">
                <input class="w-full border border-solid focus:outline-none rounded-lg p-2 mb-5" id="age" type="text" min="1" max="99" placeholder="Edad" onkeyup="validateInput(this,'age-error')">
            </div>
            <div class="w-full  flex flex-col relative">
                <select class="w-full border border-solid focus:outline-none rounded-lg p-2 mb-5 h-[42px]" id="race" onchange="validateInput(this,'race-error')">
                    <option value="">Género</option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                </select>
            </div>
            <div class="w-full flex-col relative" id="container-degree">
                <select class="w-full border border-solid focus:outline-none rounded-lg p-2 mb-5 h-[42px]" id="degree" onchange="validateInput(this,'degree-error')">
                    <option value="">Grado</option>
                    <option value="1">Tercer Año</option>
                    <option value="4">Cuarto Año</option>
                    <option value="6">Quinto Año</option>
                </select>
            </div>
            <div class="flex flex-col relative" id="container-phone">
                <input class="w-full border border-solid focus:outline-none rounded-lg p-2 mb-5" id="phone" type="number" min="1" max="999999999" placeholder="Celular" onkeyup="validateInput(this,'phone-error')">
            </div>

            <div class="flex flex-col gap-2 col-span-2">
                <h3 class="p-1 bg-[#ff103d] text-white text-[10px]">
                    Cada participante deberá adjuntar el formato de consentimiento con sus nombres completos como título del archivo.
                </h3>
                <div class="flex flex-col relative">
                    <input class="text-sm" type="file" id="file" onchange="validateInput(this,'file-error')">
                </div>
            </div>
        </div>
        <div class=" w-full border-t border-t-solid border-t-[#e9ecef] p-4 flex justify-end gap-2">
            <button class="px-3 py-[6px] bg-[#ff103d] text-white rounded-md text-base" onclick="fnCloseModal()">Cancel</button>
            <button class="px-3 py-[6px] bg-[#6c757d] text-white rounded-md text-base tracking-wide disabled:cursor-not-allowed" id="btn-save-speaker" onclick="isSaveOrUpdate()" disabled>Agregar</button>
            <!-- <button class="px-3 py-[6px] bg-[#6c757d] text-white rounded-md text-base tracking-wide disabled:cursor-not-allowed" id="btn-update-speaker" onclick="fnUpdateData()" disabled>Actualizar</button> -->
        </div>
    </div>
</div>

<script>
    const containDegree = document.getElementById("container-degree");
    const containPhone = document.getElementById("container-phone");
    const titleModal = document.getElementById("titleModal");
    const btnModal = document.getElementById("btn-save-speaker");

    function setTitleModal(participant) {
        titleModal.textContent = participant;
        if (participant.toLowerCase().includes("actualizar")) btnModal.textContent = "Actualizar";
        else btnModal.textContent = "Agregar";

        if (participant.toLowerCase().includes("profesor")) {
            containDegree.classList.add("hidden");
            // containPhone.classList.remove("w-full");
            // containPhone.classList.add("w-1/2", "pr-2");
        } else {
            containDegree.classList.remove("hidden");
            // containPhone.classList.add("w-full");
            // containPhone.classList.remove("w-1/2", "pr-2");
        }
    }

    function isSaveOrUpdate() {
        if (titleModal.textContent.toLowerCase().includes("actualizar")) fnUpdatedata();
        else fnSaveData();
    }

    function fnShowModal() {
        modal.style.display = "flex";
        body.style.overflow = "hidden";
    }

    function fnCloseModal() {
        if (titleModal.textContent.toLowerCase().includes("actualizar")) fnCleanInputModal();
        modal.style.display = "none";
        body.style.overflow = "auto";
    }
</script>