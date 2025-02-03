<div class="ue_container_register_form" id="ue_container_register_form">
    <script src="../includes/js/user_agent.js"></script>
    <script src="../includes/js/procedencia.js"></script>

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
        <div class=" px-5 sm:px-16 flex flex-col gap-7 border border-solid border-[#EBEBEB] w-auto sm:w-[700px]">
            <h1 class=" pt-5 font-bold text-xl uppercase text-center">Ficha de registro</h1>
            <div class="">
                <div class="px-8 py-1 rounded-xl bg-[#e3173e]">
                    <h2 class="font-bold text-base uppercase text-white">Datos de la institución</h2>
                </div>
                <input type="hidden" name="ueidCentro" id="ueidCentro" value="">
                <input type="hidden" name="title" id="title" value="">
                <input id="procedenciahidden" name="procedenciahidden" type="hidden">
                <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

                <div class="pt-7 grid grid-cols-1 sm:grid-cols-2 gap-x-10 gap-y-8">
                    <select class="border-b border-solid border-b-black focus:outline-none py-2" id="department" onchange="fnActiveOrDeactivateBtnSendDataTeam(this.value.length >= 1,this)">
                        <option value="">Departamento del colegio</option>
                        <option value="01">AMAZONAS</option>
                        <option value="02">ANCASH</option>
                        <option value="03">APURIMAC</option>
                        <option value="04">AREQUIPA</option>
                        <option value="05">AYACUCHO</option>
                        <option value="06">CAJAMARCA</option>
                        <option value="24">CALLAO</option>
                        <option value="07">CUSCO</option>
                        <option value="00">EXTRANJERO</option>
                        <option value="08">HUANCAVELICA</option>
                        <option value="09">HUANUCO</option>
                        <option value="10">ICA</option>
                        <option value="11">JUNIN</option>
                        <option value="12">LA LIBERTAD</option>
                        <option value="13">LAMBAYEQUE</option>
                        <option value="14">LIMA</option>
                        <option value="15">LORETO</option>
                        <option value="16">MADRE DE DIOS</option>
                        <option value="17">MOQUEGUA</option>
                        <option value="18">PASCO</option>
                        <option value="19">PIURA</option>
                        <option value="20">PUNO</option>
                        <option value="21">SAN MARTIN</option>
                        <option value="22">TACNA</option>
                        <option value="23">TUMBES</option>
                        <option value="25">UCAYALI</option>
                    </select>
                    <select class="border-b border-solid border-b-black focus:outline-none py-2" id="province" name="province" onchange="fnActiveOrDeactivateBtnSendDataTeam(this.value.length >= 1,this)">
                        <option value="">Selecciona una provincia</option>
                    </select>
                    <select class="border-b border-solid border-b-black focus:outline-none py-2" id="district" name="district" onchange="fnActiveOrDeactivateBtnSendDataTeam(this.value.length >= 1,this)">
                        <option value="">Selecciona un distrito</option>
                    </select>
                    <!--onkeyup="fnActiveOrDeactivateBtnSendDataTeam(this.value.length >= 3,this)"-->
                    <input class="border-b border-solid border-b-black focus:outline-none py-2" onkeyup="fnActiveOrDeactivateBtnSendDataTeam(this.value.length >= 2,this)" type="text" placeholder="Nombre del colegio" id="schoolName" name="schoolName">
                    <div id="detallebuscar" style="background-color: #fff;width: 100%;padding-left: 8%; ">
                        <div id="resultado"> <!-- Los <li> se insertarán aquí -->
                        </div>
                    </div>

                </div>


            </div>
            <div class="flex flex-col gap-4">
                <div class="px-8 py-1 rounded-xl bg-[#e3173e]">
                    <h2 class="font-bold text-base uppercase text-white">Datos del equipo</h2>
                </div>
                <button id="btn-add-speaker" class="flex align-middle items-center gap-1 disabled:cursor-not-allowed"
                    onclick="fnDefineParticipantType(0);fnShowModal();setTitleModal('Añadir Orador');activateButtonAddSpeaker();">
                    <i class="fa-solid fa-circle-plus text-[#e3173e] text-base"></i>
                    <h5>Añadir orador</h5>
                </button>
                <div class="flex flex-col gap-3" id="speakers-container">
                </div>
                <button id="btn-add-teacher" class="flex align-middle items-center gap-1 disabled:cursor-not-allowed"
                    onclick="fnDefineParticipantType(1);fnShowModal();setTitleModal('Añadir profesor responsable');activateButtonAddSpeaker();">
                    <i class="fa-solid fa-circle-plus text-[#e3173e] text-base"></i>
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
                        <span class="hover:border-b hover:border-b-[#e3173e] text-[#e3173e] font-bold">*Formato para participantes*</span>
                    </a>
                    <a class="" href="<?= $basePath ?>docs/Consentimiento-para-el-tratamiento-de-Datos-Personales-y-Acuerdo-de-Uso-de-Imagen-R1.docx">
                        <span class="text-[#e3173e] font-bold hover:border-b hover:border-b-[#e3173e]">*Formato para profesores responsables*</span>
                    </a>
                </div>
                <div class="flex flex-col gap-2 pt-10 mx-5 text-sm">
                    <div class="flex gap-2 justify-start items-start">
                        <input class="authorizationCheckId" type="checkbox" id="check1" name="check1" onclick="fnActiveOrDeactivateBtnSendDataTeam(this.checked,this)" required>
                        <a href="https://www.ue.edu.pe/pregrado/politica-de-privacidad" target="__blank">
                            <p class="text-[#e3173e] font-semibold -mt-1 hover:border-b hover:border-b-[#e3173e]">Acepto las condiciones de tratamiento para mis
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
                        <button class="bg-[#e3173e] px-4 py-3 disabled:cursor-not-allowed text-white disabled:text-black disabled:bg-[#DBDBDB]" id="btn-save-team" onclick="fnTeamRegister()" disabled>
                            Enviar Datos
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'modal.php' ?>
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
<script src="jquery-3.7.1.min.js"></script>
<script>
    const speakers = [];
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
    const ueidCentro = document.getElementById("ueidCentro");
    const procedencia = document.getElementById("procedenciahidden");

    function fnTeamRegister() {
        let dpto = document.getElementById("department");
        let departamento = dpto.options[dpto.selectedIndex].text;
        let prov = document.getElementById("province");
        let provincia = prov.options[prov.selectedIndex].text;
        let dist = document.getElementById("district");
        let distrito = dist.options[dist.selectedIndex].text;

        const data = {};
        data.schoolName = schoolName.value;
        data.department = departamento;
        data.province = provincia;
        data.district = distrito;
        data.ubigeo = district.value;
        data.acceptDataPolicy = check1.checked;
        data.authorizeDataUsage = check2.checked;
        data.ueidCentro = ueidCentro.value;
        data.procedencia = procedencia.value;
        data.team = speakers;
        $.ajax({
            url: 'regorador.php',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(data),
            success: function(response) {
                window.location.href = "https://www.ue.edu.pe/pregrado/gracias-campeonato-debate-escolar";
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                // // Considera mostrar un mensaje amigable al usuario
                // alert('Ocurrió un error al registrar los datos. Por favor, intenta nuevamente.');
            }
        });

    }

    /* Form  Add Speaker Start*/

    function validateInput(input, spanId) {
        let existingSpan = document.getElementById(spanId);
        if (!existingSpan) {
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
                if (input.value.length >= 4 && file.type === "application/pdf") {
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

        fnActiveOrDeactivateBtnSendDataTeam(speakers.filter(item => item.participantType === 'speaker').length >= 3, btnAddSpeaker);
        fnActiveOrDeactivateBtnSendDataTeam(speakers.filter(item => item.participantType === 'teacher').length === 1, btnAddTeacher);
        fnCloseModal();
        fnPrevListSpeakers();
    }



    async function fnUpdatedata() {
        const currentData = speakers[participantPosition.id];
        const promises = [];
        const basePath = <?= json_encode($basePath) ?>;

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
            input.value = "";
        });

        if (promises.length > 0) {
            await Promise.all(promises);
        }
        inputId = [];
        speakers[participantPosition.id] = currentData;

        fnPrevListSpeakers();
        fnCloseModal();
    }

    async function deleteOldFile(filePath) {
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
        switch (participantType) {
            case "speaker":
                if (inputId.length === 10) {
                    btnSaveSpeaker.disabled = false;
                } else {
                    btnSaveSpeaker.disabled = true;
                }
                break;
            case "teacher":
                if (inputId.length === 8 && participantType === "teacher") {
                    btnSaveSpeaker.disabled = false;
                } else {
                    btnSaveSpeaker.disabled = true;
                }
                break;
        }
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
        const speakerHTML = `
        <div class="flex justify-between bg-gray-200 px-3 py-2 items-center">
            <h3>${fullName}</h3>
            <div class="flex gap-1">
                <div class="bg-[#e3173e] p-2" onclick="fnDeleteParticipant(${position})">
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
        const editDni = document.getElementById("dni");
        const editDegree = document.getElementById("degree");
        const editPhone = document.getElementById("phone");
        const editFile = document.getElementById("file");
        inputId = [
            "name",
            "paternalname",
            "maternalname",
            "email",
            "dni",
            "race",
            "phone",
            "file"
        ]
        if (text.toLowerCase().includes("orador")) {
            inputId.push("degree")
            inputId.push("age")
        };
        editName.value = data.name;
        editPaternalname.value = data.paternalname;
        editMaternalname.value = data.maternalname;
        editEmail.value = data.email;
        editAge.value = data.age;
        editDni.value = data.dni;
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
        switch (type) {
            case "speaker":
                if (numberParticipants === 5) {
                    btnAddSpeaker.disabled = true;
                } else {
                    btnAddSpeaker.disabled = false;
                }
                break;
            case "teacher":
                if (numberParticipants === 1) {
                    btnAddTeacher.disabled = true;
                } else {
                    btnAddTeacher.disabled = false;
                }
                break;
        }

    }

    function fnDefineParticipantType(number) {
        if (number === 0) participantType = 'speaker';
        if (number === 1) participantType = 'teacher';
    }
    let inputIdTeam = [];

    function fnActiveOrDeactivateBtnSendDataTeam(condition, element) {
        switch (element.id) {
            case "department":
                provincia(element.value);
                fnConditionSendDataTeam(condition, element);
                break;
            case "province":
                distritos(element.value);
                fnConditionSendDataTeam(condition, element);
                break;
            case "schoolName":
                buscarcole();
                fnConditionSendDataTeam(condition, element);
                break;
            default:
                fnConditionSendDataTeam(condition, element);
                break;
        }
    }

    function fnConditionSendDataTeam(condition, element) {
        const btnSendData = document.getElementById("btn-save-team");
        if (condition) {
            if (!inputIdTeam.includes(element.id)) inputIdTeam.push(element.id);
        } else {
            inputIdTeam = inputIdTeam.filter(item => item !== element.id);
        }

        if (inputIdTeam.length >= 7) {
            btnSendData.disabled = false;
        } else {
            btnSendData.disabled = true;
        }
    }

    function fnCleanInputModal() {
        inputId = ["name", "paternalname", "maternalname", "email", "age", "race", "phone", "file", "degree"]
        inputId.forEach(element => {
            const input = document.getElementById(element);
            input.value = "";
        });
        inputId = [];
    }

    function provincia(dpto) {
        // //alert(dpto);
        // const selectElementDist = document.querySelector('select[name="district"]');
        // selectElementDist.innerHTML = '';


        prov = "00";
        $(document).ready(function() {
            // Enviar solicitud AJAX al archivo PHP
            vurl = "/pregrado/components/com_content/helpers/listaws.php?op=1&id=" + dpto + "&idprov=" + prov + "&iddpto=" + dpto;
            $.ajax({
                url: vurl,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    const selectElement = document.querySelector('select[name="province"]');
                    selectElement.innerHTML = '';
                    data.forEach(objeto => {
                        const option = document.createElement('option'); // Crear un elemento <option>
                        option.value = objeto.id; // Asignar el valor del objeto 'id' como valor de la opción
                        option.text = objeto.nombre; // Asignar el valor del objeto 'nombre' como texto de la opción
                        selectElement.appendChild(option); // Agregar la opción al elemento <select>						
                    });

                },
                error: function() {
                    $("#tabla-provincias").html("Error al cargar las provincias");
                }
            });
        });
    }

    function distritos(prov) {
        dpto = document.getElementById("department");
        idcol = 1;

        $(document).ready(function() {
            vurl = "/pregrado/components/com_content/helpers/listaws.php?op=2&id=" + idcol + "&idprov=" + prov + "&iddpto=" + dpto.value;
            $.ajax({
                url: vurl,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    const selectElement = document.querySelector('select[name="district"]');
                    selectElement.innerHTML = '';
                    data.forEach(objeto => {
                        const option = document.createElement('option'); // Crear un elemento <option>
                        option.value = objeto.id; // Asignar el valor del objeto 'id' como valor de la opción
                        option.text = objeto.nombre; // Asignar el valor del objeto 'nombre' como texto de la opción
                        selectElement.appendChild(option); // Agregar la opción al elemento <select>						
                    });

                },
                error: function() {
                    $("#tabla-distritos").html("Error al cargar las distritos");
                }
            });
        });
    }



    function seleccionado(idCentro, codigomodular, escala, centronombre) {

        //  alert(centronombre);
        $("#ueidCentro").val(idCentro);
        //$("#ueescala").val(escala);
        //$("#uecentronombre").val(centronombre);
        $("#schoolName").val(centronombre);
        $("#detallebuscar").hide();
    }

    function buscarcole() {
        var cole = $("#schoolName").val();
        var ubigeo = $("#district").val();
        //var ubigeo = "140200";
        //$("#_distritosjsonid").val();
        // e.preventDefault();

        if (cole.length >= 3) {
            $.ajax({
                type: "post",
                url: "/pregrado/escueladb.php",
                data: {
                    cole: cole,
                    ubigeo: ubigeo
                },
                dataType: "json",
                success: function(response) {

                    var lista = "";
                    var idcentro = "";
                    var codigomodular = "";
                    var escala = "";
                    var centronombre = "";;
                    $.each(response, function(indexInArray, valueOfElement) {

                        idcentro = response[indexInArray].IdCentro;
                        codigomodular = response[indexInArray].CodiModular;
                        escala = response[indexInArray].IdEscala;
                        centronombre = response[indexInArray].CentroNombre;
                        lista += "<li style='cursor: pointer;' onclick='seleccionado(" + idcentro + "," + codigomodular + "," + escala + ", \"" + centronombre + "\" )'>" + response[indexInArray].CentroNombre + "</li>";

                    });
                    //    $("#resultado").addClass("intro");
                    $("#resultado").html(lista);
                    $("#detallebuscar").show();
                }
            });
        }
    }

    function getCookie(name) { //Gets the value of traffic_source 
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length == 2) return parts.pop().split(";").shift();
    }

    function addTrafficSourceToForm() { //injects the traffic_source value to the form
        var elValorDeLaProcedencia = getCookie("traffic_source");
        $("#procedenciahidden").val(elValorDeLaProcedencia);
    }

    // addTrafficSourceToForm()

    $('form#fsForm2317828 input').focus(function() {
        addTrafficSourceToForm();
    });

    var misCookies = document.cookie;
    listaCookies = misCookies.split(";")
    for (i in listaCookies) {
        var vreff = listaCookies[i].substring(0, 15);
        if (vreff.trim() == "traffic_source") {
            document.f1.cookdatos.value = listaCookies[i].slice(16);
        }
    }
</script>