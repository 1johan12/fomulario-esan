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
                    <input class="border-b border-solid border-b-black focus:outline-none py-2" type="text"
                        placeholder="Nombre del colegio" id="schoolName">
                    <select class="border-b border-solid border-b-black focus:outline-none py-2" id="department">
                        <option value="">Selecciona un departamento</option>
                        <option value="lima">Lima</option>
                        <option value="arequipa">Arequipa</option>
                    </select>
                    <select class="border-b border-solid border-b-black focus:outline-none py-2" id="province">
                        <option value="">Selecciona una provincia</option>
                        <option value="lima">Lima</option>
                        <option value="huaral">Huaral</option>
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
                <button id="btn-add-speaker" class="flex align-middle items-center gap-1 disabled:cursor-not-allowed"
                    onclick="fnDefineParticipantType(0);fnShowModal();setTitleModal('Añadir Orador');">
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
                <button id="btn-add-teacher" class="flex align-middle items-center gap-1 disabled:cursor-not-allowed"
                    onclick="fnDefineParticipantType(1);fnShowModal();setTitleModal('Añadir profesor responsable')">
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
                        <input class="authorizationCheckId" type="checkbox" id="check1">
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
                        <button class="bg-[#DBDBDB] px-4 py-3" onclick="fnValidationDataBeforeRegistrationTeam()">
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
    const speakers = [{
            participantType: "teacher",
            name: "David",
            paternalname: "Alke",
            maternalname: "Benavides",
            email: "test@gmail.com",
            age: "18",
            race: "masculino",
            phone: "123456789",
            file: "http://localhost:8090/formulario/files/678597761f0ce_Libro1.pdf"
        },
        {
            participantType: "speaker",
            name: "Ernesto",
            paternalname: "Benavides",
            maternalname: "Alcides",
            email: "test@gmail.com",
            age: "18",
            race: "masculino",
            degree: "1",
            phone: "123456789",
            file: "http://localhost:8090/formulario/files/678597761f0ce_Libro1.pdf"
        },
        {
            participantType: "speaker",
            name: "Cristobal",
            paternalname: "America",
            maternalname: "Colon",
            email: "test@gmail.com",
            age: "18",
            race: "masculino",
            phone: "123456789",
            file: "http://localhost:8090/formulario/files/678597761f0ce_Libro1.pdf"
        },
        {
            participantType: "speaker",
            name: "Adolfo",
            paternalname: "Guzman",
            maternalname: "Hank",
            email: "test@gmail.com",
            age: "18",
            race: "masculino",
            phone: "123456789",
            file: "http://localhost:8090/formulario/files/678597761f0ce_Libro1.pdf"
        }
    ]
    let inputId = [];
    let participantType = "";

    const btnAddSpeaker = document.getElementById("btn-add-speaker");
    const participantPosition = document.querySelector(".participantPosition");
    const btnAddTeacher = document.getElementById("btn-add-teacher");
    const btnSaveSpeaker = document.getElementById("btn-save-speaker");
    const inputcheckBox = document.getElementsByClassName("authorizationCheckId");
    const modal = document.getElementById("ue_modal");
    const body = document.getElementsByTagName("body")[0];
    const speakersPrevContainer = document.getElementById("speakers-container");
    const teacherPrevContainer = document.getElementById("teacher-container");
    let email = document.getElementById("email");
    let email2 = document.getElementById("email2");

    /* Register Team */
    const schoolName = document.getElementById("schoolName");
    const department = document.getElementById("department");
    const province = document.getElementById("province");
    const district = document.getElementById("district");
    const check1 = document.getElementById("check1");
    const check2 = document.getElementById("check2");

    function fnValidationDataBeforeRegistrationTeam() {
        const data = {};
        data.schoolName = schoolName.value
        data.department = department.value
        data.province = province.value
        data.district = district.value
        data.check1 = check1.checked
        data.check2 = check2.checked
        data.team = speakers;
        fnTeamRegister(data);

    }

    function fnTeamRegister(data) {
        console.log("data", data);
    }

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
        console.log("inputId", inputId, document.getElementById("titleModal").textContent);

        let existingSpan = document.getElementById(spanId);
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

    async function fnSaveData() {
        let data = {};
        let uploadPromise = null;
        data["participantType"] = participantType;
        inputId.forEach(id => {
            const input = document.getElementById(id);
            if (id === "file") {
                const file = input.files[0];
                if (file) {
                    const formData = new FormData();
                    formData.append('file', file);
                    formData.append('basePath', <?= json_encode($basePath) ?>);

                    uploadPromise = fetch('upload.php', {
                            method: 'POST',
                            body: formData,
                        })
                        .then(response => response.json())
                        .then(result => {
                            console.log("Archivo subido:", result);
                            if (result.success) {
                                console.log("result.filePath ", result.filePath);

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
        fnPrevListSpeakers();
    }

    async function fnUpdatedata() {
        console.log("==============================================");
        const currentData = speakers[participantPosition.id];
        const promises = []; // Promesas para manejar la subida del archivo
        const basePath = <?= json_encode($basePath) ?>; // Evitar múltiples llamadas a PHP

        inputId.forEach(async (id) => {
            const input = document.getElementById(id);

            if (id === "file") {
                const file = input.files[0];
                if (file) {
                    const filePathNew = `${basePath}files/${file.name}`;
                    if (currentData[id]?.toLowerCase() === filePathNew.toLowerCase()) {
                        console.log("Archivo sin cambios:", currentData[id]);
                    } else {
                        const formData = new FormData();
                        formData.append("file", file);
                        formData.append('basePath', <?= json_encode($basePath) ?>);


                        try {
                            const response = await fetch("upload.php", {
                                method: "POST",
                                body: formData,
                            });
                            const result = await response.json();

                            if (result.success) {
                                console.log("Archivo actualizado con éxito:", result.filePath);

                                if (currentData[id]) {
                                    promises.push(deleteOldFile(currentData[id]));
                                }

                                currentData[id] = result.filePath;
                            } else {
                                console.error("Error al subir el archivo:", result.error);
                                alert("No se pudo actualizar el archivo.");
                            }
                        } catch (error) {
                            console.error("Error en la subida del archivo:", error);
                            alert("Error al subir el archivo.");
                        }
                    }
                }
            } else {
                currentData[id] = input.value;
            }
        });

        if (promises.length > 0) {
            await Promise.all(promises);
        }

        speakers[participantPosition.id] = currentData;

        fnPrevListSpeakers();

        console.log("Datos actualizados:", currentData);
        console.log("==============================================");
    }

    async function deleteOldFile(filePath) {
        console.log("deleteOldFile",filePath);
        
        try {
            const response = await fetch("delete_file.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    filePath, // Pasar ruta del archivo
                }),
            });

            if (!response.ok) {
                console.error("Error HTTP:", response.status, response.statusText);
                throw new Error(`HTTP error: ${response.status}`);
            }

            const result = await response.json();

            if (result.success) {
                console.log("Archivo eliminado con éxito:", filePath);
            } else {
                console.error("Error al eliminar el archivo (servidor):", result.error);
            }
        } catch (error) {
            console.error("Error en la solicitud de eliminación:", error.message || error);
        }
    }



    function activateButtonAddSpeaker() {
        console.log("Function activateButtonAddSpeaker", inputId.length, " ", participantType);
        switch (participantType) {
            case "speaker":
                console.log("case speaker");
                if (inputId.length === 9) {
                    console.log("Length 9");
                    btnSaveSpeaker.disabled = false;
                } else {
                    btnSaveSpeaker.disabled = true;
                }
                break;
            case "teacher":
                console.log("case teacher");
                if (inputId.length === 8 && participantType === "teacher") {
                    btnSaveSpeaker.disabled = false;
                } else {
                    btnSaveSpeaker.disabled = true;
                }
                break;
        }
        // if (inputId.length === 9 && participantType === "speaker") {
        //     btnSaveSpeaker.disabled = false;
        // } else if (inputId.length === 8 && participantType === "teacher") {
        //     btnSaveSpeaker.disabled = false;
        // } else {
        //     btnSaveSpeaker.disabled = true;
        // }
    }

    /* Form  Add Speaker End*/
    fnPrevListSpeakers();

    function fnPrevListSpeakers() {
        speakersPrevContainer.innerHTML = ""
        teacherPrevContainer.innerHTML = ""
        const speakersNumber = speakers.filter(speaker => speaker.participantType === 'speaker');
        const teacherNumber = speakers.filter(speaker => speaker.participantType === 'teacher');
        fnLimitParticipants(speakersNumber.length, "speaker");
        fnLimitParticipants(teacherNumber.length, "teacher");
        speakers.forEach((element, index) => {
            console.log(element.name, index);
            const speakerHTML = fnParticipants(element, index);
            if (element.participantType === "speaker") {
                speakersPrevContainer.insertAdjacentHTML("beforeend", speakerHTML);
            } else {
                teacherPrevContainer.insertAdjacentHTML("beforeend", speakerHTML);
            }
        });

    }

    function fnParticipants(element, position) {
        let valueParticipantType;
        const fullName = `${element.name} ${element.paternalname} ${element.maternalname}`;
        if (element.participantType === "speaker") {
            valueParticipantType = 0;
        } else {
            valueParticipantType = 1;
        }
        console.log("Dato", element);

        const speakerHTML = `
        <div class="flex justify-between bg-gray-200 px-3 py-2 items-center">
            <h3>${fullName}</h3>
            <div class="flex gap-1">
                <div class="bg-[#FF103D] p-2" onclick="fnDeleteParticipant(${position})">
                    <i class="fa-solid fa-trash text-[10px] text-white"></i>
                </div>
                <div class="bg-gray-500 p-2" onclick="fnDefineParticipantType(${valueParticipantType});fnEditParticipant(${position});">
                    <i class="fa-solid fa-pencil text-[10px] text-white"></i>
                </div>
            </div>
        </div>
        `
        return speakerHTML;
    }

    function fnDeleteParticipant(position) {
        try {
            speakers.splice(position, 1);
            fnPrevListSpeakers();
        } catch (error) {
            console.log(error);
        }
    }

    function fnEditParticipant(position) {
        const data = speakers[position];
        console.log("edit", data);
        participantPosition.id = position;
        let text = "Actualizar Orador";
        if (data.participantType === "teacher") text = "Actualizar Profesor Responsable";
        setTitleModal(text);
        const editName = document.getElementById("name");
        const editPaternalname = document.getElementById("paternalname");
        const editMaternalname = document.getElementById("maternalname");
        const editEmail = document.getElementById("email");
        const editAge = document.getElementById("age");
        const editRace = document.getElementById("race");
        const editDegree = document.getElementById("degree");
        const editPhone = document.getElementById("phone");
        const editFile = document.getElementById("file");
        inputId = [
            "name",
            "paternalname",
            "maternalname",
            "email",
            "age",
            "race",
            "phone",
            "file"
        ]
        if (text.toLowerCase().includes("orador")) inputId.push("degree");
        editName.value = data.name;
        editPaternalname.value = data.paternalname;
        editMaternalname.value = data.maternalname;
        editEmail.value = data.email;
        editAge.value = data.age;
        editRace.value = data.race;
        editDegree.value = data.degree;
        editPhone.value = data.phone;
        const fileUrl = data.file;

        const fileName = fileUrl.split('/').pop();

        fetch(fileUrl)
            .then(response => response.blob())
            .then(blob => {
                const file = new File([blob], fileName, {
                    type: "application/pdf"
                });

                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);

                editFile.files = dataTransfer.files;
            })
            .catch(error => {
                console.error("Error al cargar el archivo:", error);
            });
        activateButtonAddSpeaker();
        fnShowModal();
    }


    function fnLimitParticipants(numberParticipants, type) {
        console.log("Limit Participants", type, numberParticipants);
        switch (type) {
            case "speaker":
                if (numberParticipants === 3) {
                    console.log("speaker 3");
                    btnAddSpeaker.disabled = true;
                } else {
                    btnAddSpeaker.disabled = false;
                }
                break;
            case "teacher":
                if (numberParticipants === 1) {
                    console.log("teacher 1");
                    btnAddTeacher.disabled = true;
                } else {
                    btnAddTeacher.disabled = false;
                }
                break;
        }

    }

    function fnDefineParticipantType(number) {
        console.log("fnDefineParticipantType", number);

        if (number === 0) participantType = 'speaker';
        if (number === 1) participantType = 'teacher';

    }
</script>