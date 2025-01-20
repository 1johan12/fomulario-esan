<div class="pt-7 grid grid-cols-1 lg:grid-cols-2 gap-x-10">
    <div class="flex flex-col relative pb-5">
        <input class="min-w-full border-b border-solid border-b-black focus:outline-none py-2" type="text" placeholder="Nombre" id="name" onkeyup="fnValidateInput(this)">
    </div>
    <div class="flex flex-col relative pb-5">
        <input class="min-w-full border-b border-solid border-b-black focus:outline-none py-2" type="text" placeholder="Apellido paterno" id="paternalname" onkeyup="fnValidateInput(this)">
    </div>
    <div class="flex flex-col relative pb-5">
        <input class="min-w-full border-b border-solid border-b-black focus:outline-none py-2" type="text" placeholder="Apellido materno" id="maternalname" onkeyup="fnValidateInput(this)">
    </div>
    <div class="flex flex-col relative pb-5">
        <select class="min-w-full border-b border-solid border-b-black focus:outline-none py-2" id="documentType" onchange="fnValidateInput(this)">
            <option value="">Tipo de documento</option>
            <option value="dni">DNI</option>
            <option value="carnet_de_extranjeria">CARNET DE EXTRANJERIA</option>
            <option value="pasaporte">PASAPORTE</option>
        </select>
    </div>
    <div class="flex flex-col relative pb-5">
        <input class="min-w-full border-b border-solid border-b-black focus:outline-none py-2" type="number" placeholder="Nro identificación" id="identificationNumber" onkeyup="fnValidateInput(this)" disabled>
    </div>
    <div class="flex flex-col relative pb-5">
        <input class="min-w-full border-b border-solid border-b-black focus:outline-none py-2" type="number" placeholder="Edad" id="age" onkeyup="fnValidateInput(this)">
    </div>
    <div class="flex flex-col relative pb-5">
        <select class="min-w-full border-b border-solid border-b-black focus:outline-none py-2" id="race" onchange="fnValidateInput(this)">
            <option value="">Género</option>
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
        </select>
    </div>
    <div class="flex flex-col relative pb-5">
        <input class="min-w-full border-b border-solid border-b-black focus:outline-none py-2" type="text" placeholder="Ingrese E-mail" id="email" onkeyup="fnValidateInput(this)">
    </div>
    <!-- <div class="flex flex-col relative pb-5">
        <input class="min-w-full border-b border-solid border-b-black focus:outline-none py-2" type="text" placeholder="Código de País" id="countryCode" onkeyup="fnValidateInput(this)">
    </div> -->
    <div class="flex flex-col relative pb-5">
        <input class="min-w-full border-b border-solid border-b-black focus:outline-none py-2" type="number" placeholder="Celular" id="phone" onkeyup="fnValidateInput(this)">
    </div>
    <div class="flex flex-col relative pb-5">
        <select class="min-w-full border-b border-solid border-b-black focus:outline-none py-2" id="country" onchange="fnValidateInput(this)">
            <option value="">Seleccione País</option>
        </select>
    </div>
    <div class="flex relative pb-5 justify-between items-end">
        <div>
            <input type="radio" id="independentOrInstitution" name="IndependentOrInstitution" value="indepent" onclick="fnValidateInput(this)" />
            <label for="contactChoice1">Independiente</label>
        </div>
        <div>
            <input type="radio" id="independentOrInstitution" name="IndependentOrInstitution" value="institution" onclick="fnValidateInput(this)" />
            <label for="contactChoice2">Institución</label>
        </div>
    </div>
    <div class="flex flex-col relative pb-5 hidden" id="institutionNameContainer">
        <input class="min-w-full border-b border-solid border-b-black focus:outline-none py-2" type="text" placeholder="Ingrese nombre de la institución" id="institutionName" onkeyup="fnValidateInput(this)">
    </div>
</div>

<script>
    const country = document.getElementById("country");
    const identificationNumber = document.getElementById("identificationNumber");
    const selectedDocumentType = document.getElementById("documentType");
    const city = document.getElementById("city");
    const institutionName = document.getElementById("institutionName");
    const institutionNameContainer = document.getElementById("institutionNameContainer");
    let independentOrInstitution = "";
    let inputId = [];

    fnListCountry();

    function fnListCountry() {
        const url = <?= json_encode($basePath) ?> + '/jueces/src/json/countries.json';
        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                data.forEach(element => {
                    const option = document.createElement('option');
                    option.value = `${element.nameES}`;
                    option.textContent = element.nameES;
                    country.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error al cargar el JSON:', error);
            });
    }

    function fnCreateSpanError(input, spanId, elementId) {
        let existingSpan = document.getElementById(spanId);
        let inputIdValue;
        if (!existingSpan) {
            const newSpan = document.createElement("span");
            newSpan.classList.add("text-red-600", "font-bold", "text-[10px]", "text-end", "absolute", "bottom-1", "right-2");
            newSpan.id = spanId;
            newSpan.textContent = getMessage(elementId);
            input.parentNode.insertBefore(newSpan, input.nextSibling);
            existingSpan = newSpan;
        }
        return existingSpan;
    }

    function fnShowInputError(condition, existingSpan, input) {
        if (condition) {
            existingSpan.classList.add("hidden");
            input.classList.remove("border-b-red-600", "border-b-2");
            input.classList.add("border-b-black", "border-b");
            if (!inputId.includes(input.id)) inputId.push(input.id);
        } else {
            existingSpan.classList.remove("hidden");
            input.classList.remove("border-b-black", "border-b");
            input.classList.add("border-b-red-600", "border-b-2");
            inputId = inputId.filter(item => item !== input.id);
        }
        console.log(inputId);

    }

    function fnValidateInput(input) {
        let condition;
        let spanId = `${input.id}-error`
        let idInputMessage = input.id;
        if (input.id === "identificationNumber") idInputMessage = selectedDocumentType.value;
        const existingSpan = fnCreateSpanError(input, spanId, idInputMessage);
        let elementId = input.id;
        switch (elementId) {
            case "email":
                let validEmail = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
                condition = validEmail.test(input.value)
                fnShowInputError(condition, existingSpan, input);
                break;
            case "documentType":
                identificationNumber.value = "";
                identificationNumber.placeholder = `Ingrese nro ${input.value.replace(/_/g, ' ')}`;
                condition = input.value.length >= 1;
                if (condition) identificationNumber.disabled = false;
                else identificationNumber.disabled = true;
                fnShowInputError(condition, existingSpan, input);
                break;
            case "identificationNumber":
                if (selectedDocumentType.value === "dni") condition = input.value.length === 8;
                if (selectedDocumentType.value === "carnet_de_extranjeria" || selectedDocumentType.value === "pasaporte") condition = input.value.length >= 5 && input.value.length <= 20;
                fnShowInputError(condition, existingSpan, input);
                break;
            case "age":
                condition = input.value.length >= 2 && input.value.length <= 2;
                fnShowInputError(condition, existingSpan, input);
                break;
            case "acceptDataPolicy":
                condition = input.checked;
                fnShowInputError(condition, existingSpan, input);
                break;
            case "independentOrInstitution":
                condition = input.value.length >= 2;
                if (input.value === "institution") {
                    institutionNameContainer.classList.remove("hidden");
                } else {
                    inputId = inputId.filter(item => item !== "institutionName");
                    institutionName.value = "";
                    institutionNameContainer.classList.add("hidden");
                }
                independentOrInstitution = input.value;
                fnShowInputError(condition, existingSpan, input);
                break;
            default:
                condition = input.value.length >= 2;
                fnShowInputError(condition, existingSpan, input);
                break;
        }
        fnActivateButtonRegisterJugde();
    }


    function getMessage(inputIdMessage) {
        const messages = {
            name: "Nombre obligatorio*",
            paternalname: "Apellido paterno obligatorio*",
            maternalname: "Apellido materno obligatorio*",
            dni: "El dni debe contener 8 digitos*",
            carnet_de_extranjeria: "Carnet de extranjería es obligatorio",
            pasaporte: "Pasaporte es obligatorio",
            email: "El correo no es válido.*",
            age: "Edad es obligatorio*",
            race: "El genero es obligatorio*",
            phone: "El celular es obligatorio*",
            countryCode: "Código de País Obligatorio",
            country: "Pais Obligatorio",
            city: "Ciudad es Obligatorio",
            nationality: "Nacionalidad es Obligatorio",
            institutionName: "Nombre de la institucion obligatorio",
            file: "Selecciona un archivo*"
        };
        return messages[inputIdMessage] || "Error no especificado.";
    }

    let condition;

    function fnActivateButtonRegisterJugde() {
        let conditionNumber = 12;
        if (independentOrInstitution === "institution") conditionNumber = 13;
        if (inputId.length === conditionNumber) btnSaveJugde.disabled = false;
        else btnSaveJugde.disabled = true;
    }
</script>