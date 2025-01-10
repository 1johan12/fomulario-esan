<div class="ue_container_register_form" id="ue_container_register_form">
    <div class="">
        <img class="object-cover object-center w-full h-[150px]" src="<?= $basePath ?>assets/banner.jpg" alt="">
    </div>
    <div class="flex flex-col justify-center items-center gap-3 py-3">
        <div class="flex justify-center gap-2.5">
            <h5 class="font-semibold text-[#4A494A]">Bases del campeonato</h5>
            <div class="flex px-[5px] py-px rounded-[50px] border-2 border-solid border-[#FF103D]">
                <i class="fa-solid fa-arrow-down h-5 flex justify-center text-[#FF103D] items-center"></i>
            </div>
        </div>
        <div class=" px-16 flex flex-col gap-7 border border-solid border-[#EBEBEB] w-[700px]">
            <h1 class=" pt-5 font-bold text-xl uppercase text-center">Ficha de registro</h1>
            <div class="">
                <div class="px-8 py-1 rounded-xl bg-[#FF103D]">
                    <h2 class="font-bold text-base uppercase text-white">Datos de la institución</h2>
                </div>
                <div class="pt-7 grid grid-cols-2 gap-x-10 gap-y-8">
                    <input class="border-b border-solid border-b-black focus:outline-none py-2" type="text" placeholder="Nombre del colegio">
                    <!-- <input class="border-b border-solid border-b-black focus:outline-none py-2" type="text" placeholder="Departamento">
                    <input class="border-b border-solid border-b-black focus:outline-none py-2" type="text" placeholder="Provincia">
                    <input class="border-b border-solid border-b-black focus:outline-none py-2" type="text" placeholder="Distrito"> -->
                    <select class="border-b border-solid border-b-black focus:outline-none py-2" id="department">
                        <option value="">Selecciona un departamento</option>
                        <option value="lurigancho">Lurigancho</option>
                        <option value="sjl">San Juan de Lurigancho</option>
                    </select>
                    <select class="border-b border-solid border-b-black focus:outline-none py-2" id="province">
                        <option value="">Selecciona una provincia</option>
                        <option value="lurigancho">Lurigancho</option>
                        <option value="sjl">San Juan de Lurigancho</option>
                    </select>
                    <select class="border-b border-solid border-b-black focus:outline-none py-2" id="district">
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
                <button id="btn-add-speaker" class="flex align-middle items-center gap-1 disabled:cursor-not-allowed" onclick="participantType='orador';fnShowModal();setTitleModal('Añadir Orador');">
                    <i class="fa-solid fa-circle-plus text-[#FF103D] text-base"></i>
                    <h5>Añadir orador</h5>
                </button>
                <div class="flex flex-col gap-3" id="speakers-container">
                    <!-- <div class="flex justify-between bg-gray-200 px-3 py-2 items-center">
                        <h3>Johnny Huama Villanueva</h3>
                        <div class="flex gap-1">
                            <div class="bg-[#FF103D] p-2">
                                <i class="fa-solid fa-trash text-[10px] text-white"></i>
                            </div>
                            <div class="bg-gray-500 p-2">
                                <i class="fa-solid fa-pencil text-[10px] text-white"></i>
                            </div>
                        </div>
                    </div> -->
                </div>
                <button id="btn-add-teacher" class="flex align-middle items-center gap-1 disabled:cursor-not-allowed" onclick="participantType='profesor';fnShowModal();setTitleModal('Añadir profesor responsable')">
                    <i class="fa-solid fa-circle-plus text-[#FF103D] text-base"></i>
                    <h5>Añadir profesor responsable</h5>
                </button>
                <div class="flex flex-col gap-3" id="teacher-container">
                </div>
            </div>
            <div class="pb-4">
                <div class="flex flex-col gap-1 border border-solid border-black text-center text-sm">
                    <p>
                        Para poder utilizar las fotografias y videos en los que participes, por favor descarga este Consentimiento para el tratamiento
                        de Datos Personales y Acuerdo de Uso de Imagen y adjúntalo en el formulario.
                    </p>
                    <span class="text-[#FF103D] font-bold">*Formato para participantes*</span>
                    <span class="text-[#FF103D] font-bold">*Formato para profesores responsables*</span>
                </div>
                <div class="flex flex-col gap-2 pt-10 mx-5 text-sm">
                    <div class="flex gap-2 justify-start items-start">
                        <input class="authorizationCheckId" type="checkbox" id="check1">
                        <p class="text-[#FF103D] font-semibold -mt-1">Acepto las condiciones de tratamiento para mis datos personales</p>
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
                        <button class="bg-[#DBDBDB] px-4 py-3">
                            Enviar Datos
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'modal.php' ?>

<script>
    document.addEventListener("DOMContentLoaded", (event) => {
        console.log("DOM fully loaded and parsed");
    });
    const speakers = [];
    let inputId = [];
    let participantType = "";

    const btnAddSpeaker = document.getElementById("btn-add-speaker");
    const btnAddTeacher = document.getElementById("btn-add-teacher");
    const btnSaveSpeaker = document.getElementById("btn-save-speaker");
    const inputcheckBox = document.getElementsByClassName("authorizationCheckId");
    const modal = document.getElementById("ue_modal");
    const body = document.getElementsByTagName("body")[0];
    const speakersPrevContainer = document.getElementById("speakers-container");
    const teacherPrevContainer = document.getElementById("teacher-container");
    let email = document.getElementById("email");
    let email2 = document.getElementById("email2");

    function fnChecked(event) {
        console.log(inputcheckBox);
        console.log("checked", event.target);
    }

    Array.from(inputcheckBox).forEach(checkbox => {
        checkbox.addEventListener("change", fnChecked);
    });

    function fnShowModal() {

        modal.style.display = "flex";
        body.style.overflow = "hidden";
    }
    // body.style.overflow = "hidden";

    function fnCloseModal() {
        modal.style.display = "none";
        body.style.overflow = "auto";
    }

    /* Form  Add Speaker Start*/

    // New

    function validateInput(input, spanId) {
        console.log(input.value, spanId);

        let existingSpan = document.getElementById(spanId);
        // console.log(input.value);
        if (!existingSpan) {
            console.log("not exist ", spanId);
            const newSpan = document.createElement("span");
            newSpan.classList.add(
                "text-red-600",
                "font-bold",
                "text-[10px]",
                "text-end",
                "absolute",
                "bottom-1",
                "right-2"
            );
            newSpan.id = spanId;
            newSpan.textContent = getMessage(input.id);
            input.parentNode.insertBefore(newSpan, input.nextSibling);
            existingSpan = newSpan;
        }

        switch (input.id) {
            case "dni":
                existingSpan.classList.remove("hidden");
                if (input.value.length === 8) {
                    existingSpan.classList.add("hidden");
                    input.style.border = "1px solid #e5e7eb";
                    if (!inputId.includes(input.id)) inputId.push(input.id);
                } else {
                    input.style.border = "2px solid red";
                    inputId = inputId.filter(item => item !== input.id);
                }
                break;
            case "email":
                validateEmail(existingSpan, input);
                break;
            case "email2":
                validateEmail(existingSpan, input);
                fnCheckEmail(existingSpan, input.id);
                break;
            case "age":
                existingSpan.classList.remove("hidden");
                if (input.value.length >= 2 && input.value.length <= 2) {
                    existingSpan.classList.add("hidden");
                    input.style.border = "1px solid #e5e7eb";
                    if (!inputId.includes(input.id)) inputId.push(input.id);
                } else {
                    input.style.border = "2px solid red";
                    inputId = inputId.filter(item => item !== input.id);
                }
                break;
            case "phone":
                existingSpan.classList.remove("hidden");
                if (input.value.length === 9) {
                    existingSpan.classList.add("hidden");
                    input.style.border = "1px solid #e5e7eb";
                    if (!inputId.includes(input.id)) inputId.push(input.id);
                } else {
                    input.style.border = "2px solid red";
                    inputId = inputId.filter(item => item !== input.id);
                }
                break;
            case "degree":
                existingSpan.classList.remove("hidden");
                if (input.value.length >= 1) {
                    existingSpan.classList.add("hidden");
                    input.style.border = "1px solid #e5e7eb";
                    if (!inputId.includes(input.id)) inputId.push(input.id);
                } else {
                    input.style.border = "2px solid red";
                    inputId = inputId.filter(item => item !== input.id);
                }
                break;
            case "file":
                const file = input.files[0];
                existingSpan.classList.remove("hidden");
                console.log("File ONE");
                if (input.value.length >= 4 && file.type === "application/pdf") {
                    console.log("File TWO");
                    existingSpan.classList.add("hidden");
                    input.style.border = "1px solid #e5e7eb";
                    if (!inputId.includes(input.id)) inputId.push(input.id);
                } else {
                    input.value = "";
                    input.style.border = "2px solid red";
                    inputId = inputId.filter(item => item !== input.id);
                }
                break;
            default:
                if (input.value.length > 2) {
                    existingSpan.classList.add("hidden");
                    input.style.border = "1px solid #e5e7eb";
                    if (!inputId.includes(input.id)) inputId.push(input.id);
                } else {
                    existingSpan.classList.remove("hidden");
                    input.style.border = "2px solid red";
                    inputId = inputId.filter(item => item !== input.id);
                }
                break;
        }
        activateButtonAddSpeaker();
    }


    function fnCheckEmail(existingSpan, inputIdValue) {
        console.log("Test => ", email2.value);
        email2.style.border = "2px solid red"
        existingSpan.classList.remove("hidden");
        inputId = inputId.filter(item => item !== inputIdValue);
        if (email2.value === email.value) {
            email2.style.border = "1px solid #e5e7eb"
            existingSpan.classList.add("hidden");
            if (!inputId.includes(inputId)) inputId.push(inputIdValue);
        }
    }

    function validateEmail(newSpan, input) {
        let spanError = document.getElementById(newSpan.id);
        var validEmail = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
        if (validEmail.test(input.value)) {
            if (!inputId.includes(input.id)) inputId.push(input.id);
            input.style.border = "1px solid #e5e7eb";
            spanError.classList.add("hidden");
        } else {
            inputId = inputId.filter(item => item !== input.id);
            input.style.border = "2px solid red";
            spanError.classList.remove("hidden")
        }
    }

    function getMessage(inputIdMessage) {
        const messages = {
            name: "Nombre obligatorio*",
            paternalname: "Apellido paterno obligatorio*",
            maternalname: "Apellido materno obligatorio*",
            dni: "El dni debe contener 8 digitos*",
            email: "El correo no es válido.*",
            email2: "Los correos no coinciden*",
            age: "Edad es obligatorio*",
            race: "El genero es obligatorio*",
            degree: "El grado es obligatorio*",
            phone: "El celular debe contener 9 digitos*",
            file: "Selecciona un archivo*"
        };
        return messages[inputIdMessage] || "Error no especificado.";
    }

    async function fnAddSpeaker() {
        let data = {};
        let uploadPromise = null;
        data["participantType"] = participantType;
        // }
        inputId.forEach(id => {
            const input = document.getElementById(id);
            if (id === "file") {
                const file = input.files[0];
                if (file) {
                    const formData = new FormData();
                    formData.append('file', file);
                    console.log("file2");

                    uploadPromise = fetch('upload.php', {
                            method: 'POST',
                            body: formData,
                        })
                        .then(response => response.json())
                        .then(result => {
                            console.log("Archivo subido:", result);
                            if (result.success) {
                                data[id] = result.filePath;
                            } else {
                                console.error("Error al subir archivo:", result.error);
                                alert("No se pudo subir el archivo.");
                            }
                        })
                        .catch(error => {
                            console.error("Error en la subida:", error);
                            alert("Hubo un problema al subir el archivo.");
                        });
                }
            } else {
                data[id] = input.value;
            }

            input.value = "";
        });

        if (uploadPromise) await uploadPromise;

        inputId = [];
        speakers.push(data);
        console.log(speakers);

        fnCloseModal();
        btnSaveSpeaker.disabled = true;

        fnPrevListSpeakers();
    }

    function activateButtonAddSpeaker() {
        if (inputId.length === 9 && participantType === "orador") {
            btnSaveSpeaker.disabled = false;
        } else if (inputId.length === 8 && participantType === "profesor") {
            btnSaveSpeaker.disabled = false;
        } else {
            btnSaveSpeaker.disabled = true;
        }
    }

    /* Form  Add Speaker End*/

    function fnPrevListSpeakers(params) {
        speakersPrevContainer.innerHTML = ""
        teacherPrevContainer.innerHTML = ""
        const oradores = speakers.filter(speaker => speaker.participantType === 'orador');
        if(oradores.length >= 1 ){
            console.log("oradores 1");
            btnAddSpeaker.disabled = "true";
        }else{
            btnAddSpeaker.disabled = "false";

        }
        speakers.forEach(element => {
            console.log(element.name);
            const speakerHTML = participants(element);
            if (element.participantType === "orador") {
                speakersPrevContainer.insertAdjacentHTML("beforeend", speakerHTML);
            } else {
                teacherPrevContainer.insertAdjacentHTML("beforeend", speakerHTML);
            }
        });
    }

    function participants(element) {
        const speakerHTML = `
        <div class="flex justify-between bg-gray-200 px-3 py-2 items-center">
            <h3>${element.name}</h3>
            <div class="flex gap-1">
                <div class="bg-[#FF103D] p-2">
                    <i class="fa-solid fa-trash text-[10px] text-white"></i>
                </div>
                <div class="bg-gray-500 p-2">
                    <i class="fa-solid fa-pencil text-[10px] text-white"></i>
                </div>
            </div>
        </div>
        `

        return speakerHTML;
    }
</script>