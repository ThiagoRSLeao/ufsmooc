
/* 
Adiciona a stylesheet que contem os estilos pros elementos do arquivo 
var backgroundCourtain = document.createElement("link");
backgroundCourtain.setAttribute("src", "backgroundCourtain");
backgroundCourtain.setAttribute("type", "text/stylesheet");
*/
/**Cria a cortina, elemento responsável por impedir o contato com os demais elementos */

function createCourtain()
{
    if(!checkCourtain("backgroundCourtain"))
    {
        var backgroundCourtain = document.createElement("DIV");
        backgroundCourtain.setAttribute("ID", "backgroundCourtain");
        backgroundCourtain.setAttribute("class", "background-courtain");
        backgroundCourtain.style.zIndex = '10';
        backgroundCourtain.style.position = "fixed";
        backgroundCourtain.style.top = "0";
        backgroundCourtain.style.left = "0";
        backgroundCourtain.style.height = "100%";
        backgroundCourtain.style.width = "100%";
        backgroundCourtain.style.display = "flex";
        backgroundCourtain.style.justifyContent = "center";
        backgroundCourtain.style.alignItems = "center";
        backgroundCourtain.style.background = "rgba(100,100,100,0.5)";
        document.body.appendChild(backgroundCourtain);
    }
    else
    {

    }
}
function getCourtain()
{
    return document.getElementById("backgroundCourtain");
}
function checkCourtain()
{
    if(getCourtain() != null && getCourtain() != undefined)
    {
        return true;
    }
    else
    {
        return false;
    }
}
function appendCourtain(elem)
{    
    if(checkCourtain())
    {
        getCourtain().appendChild(elem);
    }
}
function deleteCourtain()
{
    if(checkCourtain("backgroundCourtain"))
    {
        getCourtain().remove();
    }
    else
    {

    }
}
//--------Criação de Cursos---------//
class Course
{
    title;
    subtitle;
    category;
    hourNumber;
    description;

    pathImage;
    timelimit;
    timeduration;
    have_certification;
    have_tutor;

    worksNotificationNumber;
    questionsNotificationNumber;
    doubtsNotificationNumber;
    muralNotificationNumber;

    constructor() 
    {
        this.title = null;
        this.subtitle = null;

        this.category = null;
        this.hournumber = null;
        this.description = null;

        this.timelimit = null;
        this.timeduration = null;
        this.have_certification = null;
        this.have_tutor = null;
        this.pathImage = null;

        this.worksNotificationNumber = 10;
        this.questionsNotificationNumber = 20;
        this.doubtsNotificationNumber = 30;
        this.muralNotificationNumber = 40;
    }
    getTitle(){
        return this.title;
    }
    getSubtitle(){
        return this.subtitle;
    }
    getCategory(){
        return this.category;
    }
    getHourNumber(){
        return this.hourNumber;
    }
    getDescription(){
        return this.description;
    }
    getPathImage(){
        return this.pathImage;
    }
    getWorksNotificationNumber(){
        return this.worksNotificationNumber;
    }
    getQuestionsNotificationNumber(){
        return this.questionsNotificationNumber;
    }
    getDoubtsNotificationNumber(){
        return this.doubtsNotificationNumber;
    }
    getMuralNotificationNumber(){
        return this.muralNotificationNumber;
    }

    setTitle(title){
        this.title = title;
    }
    setSubtitle(subtitle){
        this.subtitle = subtitle;
    }
    setCategory(category){
        this.category = category;
    }
    setHourNumber(hourNumber){
        this.hourNumber = hourNumber;
    }
    setDescription(description){
        this.description = description;
    }
    setPathImage(pathImage){
        this.pathImage = pathImage;
    }
    setWorksNotificationNumber(worksNotificationNumber){
        this.worksNotificationNumber = worksNotificationNumber;
    }
    setQuestionsNotificationNumber(questionsNotificationNumber){
        this.questionsNotificationNumber = questionsNotificationNumber;
    }
    setDoubtsNotificationNumber(doubtsNotificationNumber){
        this.doubtsNotificationNumber = doubtsNotificationNumber;
    }
    setMuralNotificationNumber(muralNotificationNumber){
        this.muralNotificationNumber = muralNotificationNumber;
    }
}

function show(elem)
{
    elem.classList.remove('hidden');
}
function hide(elem)
{
    elem.classList.add('hidden');
}
function createSelect(selectAttributes, options)
{
    //Cria um elemento select;
    var select = document.createElement("select");
    /*
        Define seus atributos pelo array selectAttributes, cujo cada elemento 
        é um array de dois elementos tal que: 
            - selectAttributes[x][0] é o nome do atributo x
            - selectAttributes[x][1] é o valor do atributo x
    */
    for(let count = 0; count < selectAttributes.length; count++)
    {
        select.setAttribute(selectAttributes[count][0], selectAttributes[count][1]);
    }
    /*
        Define seus atributos pelo array options, cujo cada elemento 
        representa dois attributos de uma option tal que: 
            - options[x][0] é o valor do atributo value da option x
            - options[x][1] é o valor do innerHTML da option x
    */
    for(let count = 0; count < options.length; count++)
    {
        var option = document.createElement("option");
        for(let countX = 0; countX < options[count].length; countX++)
        {
            option.setAttribute("value", options[count][0]);
            option.innerHTML = options[count][1];
        }
        select.appendChild(option);
    }
    return select;
}

/*function createSelectMirror(selectAttributes, options)
{
    var select = createSelect([], options);

    var selectMirror = createSelect(selectAttributes, options);
    var optionsMirrors;
    
    for(let count = 0; count < selectAttributes.length; count++)
    {
        selectMirror.setAttribute(selectAttributes[count][0], selectAttributes[count][1]);
    }

    for(let count = 0; count < options.length; count++)
    {
        var option = document.createElement("option");
        for(let countX = 0; countX < options[count].length; countX++)
        {
            option.setAttribute("value", options[count][0]);
            option.innerHTML = options[count][1];
        }
        select.appendChild(option);
    }

    return selectMirror;
}*/

function createCourseCreationWindow(course)
{
    //CREATING CONTAINER OF COURSE CREATION
    if(checkCourtain())
    {
        deleteCourtain();
    }
    createCourtain();    

    var container = document.createElement("div");
    container.setAttribute("class", "create-course-container");

    //HEAD OF WINDOW OF COURSE CREATION
        var head = document.createElement("div");
        head.setAttribute("class", "create-course-container-head");
        head.innerHTML = "Criar curso";
        container.appendChild(head);

    //BODY OF WINDOW OF COURSE CREATION
        var body = document.createElement("div");
        body.setAttribute("class", "create-course-container-body");
        container.appendChild(body);

            var bodyInputsWrapper = document.createElement("div");
            bodyInputsWrapper.setAttribute("class", "create-course-container-body-inputs-wrapper");
            body.appendChild(bodyInputsWrapper);

                var bodyInputTitle = document.createElement("input");
                bodyInputTitle.setAttribute("type", "text");
                bodyInputTitle.setAttribute("placeholder", "Título do curso");
                bodyInputTitle.setAttribute("name", "courseName");
                bodyInputTitle.setAttribute("class", "create-course-container-body-name-input");
                bodyInputsWrapper.appendChild(bodyInputTitle);

                var bodyInputSubtitle = document.createElement("input");
                bodyInputSubtitle.setAttribute("type", "text");
                bodyInputSubtitle.setAttribute("placeholder", "Subtitulo do curso");
                bodyInputSubtitle.setAttribute("name", "courseNumberModules");
                bodyInputSubtitle.setAttribute("class", "create-course-container-body-number-modules-input");
                bodyInputsWrapper.appendChild(bodyInputSubtitle);
    
    //FOOT OF WINDOW OF COURSE CREATION
        var foot = document.createElement("div");
        foot.setAttribute("class", "create-course-container-foot");
        container.appendChild(foot);

            var footCancelButton = document.createElement("input");
            footCancelButton.setAttribute("type", "button");
            footCancelButton.setAttribute("value", "Cancelar");
            footCancelButton.setAttribute("class", "create-course-container-foot-cancel-btn");    
            foot.appendChild(footCancelButton);

            var footCreateButton = document.createElement("input");
            footCreateButton.setAttribute("type", "button");
            footCreateButton.setAttribute("value", "Criar");
            footCreateButton.setAttribute("class", "create-course-container-foot-create-btn");    
            foot.appendChild(footCreateButton);

    //Eventos
     
    footCancelButton.addEventListener("click", function() {
        deleteCourtain();
    }); 
    
    footCreateButton.addEventListener("click", function (){
        deleteCourtain();
        var course = new Course();
        course.setPathImage(standardCourseImage);
        course.setTitle(bodyInputTitle.value);
        course.setSubtitle(bodyInputSubtitle.value);
        setCourseDetailsWindow(course);
    });
    appendCourtain(container);
}

function setCourseDetailsWindow(course)
{
    //CREATING CONTAINER OF COURSE CREATION
    deleteCourtain();
    createCourtain();    
    var containerDetails = document.createElement("div");
    containerDetails.setAttribute("class", "create-course-details-container");

         //Cabeça
        var head = document.createElement("div");
        head.setAttribute("class", "create-course-details-head");
        containerDetails.appendChild(head);

            //Cabeçalho
            var header = document.createElement("div");
            header.setAttribute("class", "create-course-details-header");
            head.appendChild(header);

                headerWrapper = new Array();
                headerWrapper[0] = document.createElement("div");
                headerWrapper[0].setAttribute("class", "create-course-details-header-wrapper");
                                
                    var title = document.createElement("input");
                    title.value = course.getTitle();                 
                    title.disabled = "true"; 
                    title.setAttribute("class", "create-course-details-title"); 
                    headerWrapper[0].appendChild(title);

                headerWrapper[1] = document.createElement("div");
                headerWrapper[1].setAttribute("class", "create-course-details-header-wrapper");
                    
                    var subtitle = document.createElement("input");
                    subtitle.setAttribute("TYPE", "text");
                    subtitle.value = course.getSubtitle();            
                    subtitle.disabled = "true";     
                    subtitle.setAttribute("class", "create-course-details-subtitle");    
                    headerWrapper[1].appendChild(subtitle);

                header.appendChild(headerWrapper[0]);
                header.appendChild(headerWrapper[1]);
            //Menu
        var body = document.createElement("div");
        body.setAttribute("class", "create-course-details-body");
        containerDetails.appendChild(body);

            var bodyInformation = document.createElement("div");
            bodyInformation.setAttribute("class", "create-course-details-body-information");
            body.appendChild(bodyInformation);    

                boxWrapper = new Array();

                boxWrapper[0] = document.createElement("div");
                boxWrapper[0].setAttribute("class", "create-course-details-body-information-box-half-wrapper");
                bodyInformation.appendChild(boxWrapper[0]);

                    var imageFakeInput = document.createElement("img");
                    imageFakeInput.setAttribute("class", "create-course-details-body-information-image-fake-input");
                    imageFakeInput.src = course.getPathImage();
                    boxWrapper[0].appendChild(imageFakeInput);

                    var selectAttributes = [
                        ["id", "fieldSelect"],
                        ["class", "create-course-details-body-information-field-select"]
                    ];
                    var options = [
                        ["T", "Técnologicas"],
                        ["B", "Biologicas"],
                        ["L", "Linguagens"],
                        ["H", "Ciências Humanas"],
                        ["E", "Ciências Exatas"]
                    ];
                    var fieldSelect = createSelect(selectAttributes, options);
                    boxWrapper[0].appendChild(fieldSelect);

                    var numHourWrapper = document.createElement("div");
                    numHourWrapper.setAttribute("class", "create-course-details-body-information-number-hours-wrapper");
                    boxWrapper[0].appendChild(numHourWrapper);

                        var numHourLabel = document.createElement("div");
                        numHourLabel.setAttribute("class", "create-course-details-body-information-number-hours-label");
                        numHourLabel.innerHTML = "Número de Horas:";
                        numHourWrapper.appendChild(numHourLabel);

                        var numHourInput = document.createElement("input");
                        numHourInput.setAttribute("class", "create-course-details-body-information-number-hours-input");
                        numHourInput.setAttribute("Type", "number");
                        numHourInput.setAttribute("placeholder", "Ex: 40");
                        numHourInput.maxLength = "4";
                        numHourInput.innerHTML = "Número de Horas:";
                        numHourWrapper.appendChild(numHourInput);

                boxWrapper[1] = document.createElement("div");
                boxWrapper[1].setAttribute("class", "create-course-details-body-information-box-half-wrapper");
                bodyInformation.appendChild(boxWrapper[1]);
                
                    
                    checkboxContainer = document.createElement("div");
                    checkboxContainer.setAttribute("class", "create-course-details-body-information-box-checkbox-container");
                    boxWrapper[1].appendChild(checkboxContainer);

                        var checkboxWrapper = new Array();
                        var checkboxes = new Array();
                        var labels = new Array();
                        var inputs = new Array();
                        var checkboxesId = ['possuiInscricao','ministradoGradualmente','possuiCertificado','possuiTutoria', 'possuiMensagemPrivada'];
                        var labelsInnerHTML = ['Possui período de inscrição','Será ministrado gradualmente','Possui certificação','Possui tutoria', 'Possui comentários anônimos'];
                        
                        for(let count = 0; count < checkboxesId.length; count++)
                        {
                            checkboxWrapper[count] = document.createElement("div");
                            checkboxWrapper[count].setAttribute('class', 'create-course-details-body-information-checkbox-wrapper');
                                
                                checkboxes[count] = document.createElement("input");
                                checkboxes[count].setAttribute("type", "checkbox");
                                checkboxes[count].setAttribute("class", "create-course-details-body-information-checkbox");
                                checkboxes[count].setAttribute('id', checkboxesId[count]);
                                checkboxWrapper[count].appendChild(checkboxes[count]);

                                labels[count] = document.createElement("div");
                                labels[count].setAttribute("class", "create-course-details-body-information-checkbox-label");
                                labels[count].innerHTML = labelsInnerHTML[count];
                                checkboxWrapper[count].appendChild(labels[count]);
                            
                                checkboxContainer.appendChild(checkboxWrapper[count]); 
                        }

                        var inputsId = [['inicioDataInscricao', 'fimDataInscricao'], ['inicioDataMinistrado', 'fimDataMinistrado']];
                        
                        for(let count = 0; count < inputsId.length; count++)
                        {
                            var inicio = count * 2;
                            var fim = count * 2 + 1;

                            inputs[inicio] = document.createElement("input");
                            inputs[inicio].setAttribute("type", "text");
                            inputs[inicio].setAttribute("placeholder", "Data início");
                            inputs[inicio].setAttribute('class', 'create-course-details-body-information-checkbox-number');
                            inputs[inicio].setAttribute('id', inputsId[count][0]);

                            inputs[fim] = document.createElement("input");
                            inputs[fim].setAttribute("type", "text");
                            inputs[fim].setAttribute("placeholder", "Data fim");
                            inputs[fim].setAttribute('class', 'create-course-details-body-information-checkbox-number');
                            inputs[fim].setAttribute('id', inputsId[count][1]);

                            checkboxWrapper[count].appendChild(inputs[inicio]);
                            checkboxWrapper[count].appendChild(inputs[fim]);

                            checkboxes[count].addEventListener('click', function (){
                                if(checkboxes[count].checked == true)
                                {
                                    checkboxWrapper[count].classList.add('expand');
                                }
                                else
                                {
                                    checkboxWrapper[count].classList.remove('expand');
                                }
                            });
                        }

                var descriptionContainer = document.createElement("div");
                descriptionContainer.setAttribute("class", "create-course-details-body-information-description-container");
                bodyInformation.appendChild(descriptionContainer);

                    var descriptionLabel = document.createElement("div");
                    descriptionLabel.innerHTML = "Descrição do curso";
                    descriptionLabel.setAttribute("class", "create-course-details-body-information-description-label");
                    descriptionContainer.appendChild(descriptionLabel);

                    var descriptBox = document.createElement("div");
                    descriptBox.setAttribute("class", "create-course-details-body-information-description-box");
                    descriptionContainer.appendChild(descriptBox);

                        var descriptionTextarea = document.createElement("textarea");
                        descriptionTextarea.setAttribute("id", "descriptionTextarea");
                        descriptionTextarea.setAttribute("class", "create-course-details-body-information-description-textarea");
                        descriptBox.appendChild(descriptionTextarea);                
                        
                        var buttonContainer = document.createElement("div");
                        buttonContainer.setAttribute("class", "create-course-details-body-information-button-container");
                        descriptBox.appendChild(buttonContainer);

                            var cancelButton = document.createElement("input");
                            cancelButton.setAttribute("type", "button");
                            cancelButton.setAttribute("value", "Cancelar");
                            cancelButton.setAttribute("class", "create-course-container-body-information-cancel-course-button");    
                            cancelButton.addEventListener("click", function() {
                                deleteCourtain();
                            }); 
                            buttonContainer.appendChild(cancelButton); 
                
                            var createButton = document.createElement("input");
                            createButton.course = course;
                            createButton.setAttribute("class", "create-course-details-body-information-create-course-button");
                            createButton.setAttribute("value", "Criar curso");
                            createButton.setAttribute("type", "button");
                            createButton.addEventListener("click", function(){
                                deleteCourtain();
                                putCourse();
                            });
                            buttonContainer.appendChild(createButton);
    appendCourtain(containerDetails);
}
function putCourse()
{
    
    var container = document.getElementById('coursesContainer');

        var courseBox = document.createElement("div");
        courseBox.setAttribute("class","course-box");
        container.appendChild(courseBox);

            var courseTitle = document.createElement("div");
            courseTitle.setAttribute("class","course-title");
            courseTitle.innerHTML = event.target.course.getTitle();
            courseBox.appendChild(courseTitle);

            var courseSubtitle = document.createElement("div");
            courseSubtitle.setAttribute("class","course-subtitle");
            courseSubtitle.innerHTML = event.target.course.getSubtitle();
            courseBox.appendChild(courseSubtitle);

            var courseBody = document.createElement("div");
            courseBody.setAttribute("class","course-body");
            courseBox.appendChild(courseBody);

                var courseAlertTitle = document.createElement("div");
                courseAlertTitle.setAttribute("class","course-alert-title");
                courseAlertTitle.innerHTML ="Notificações";
                courseBody.appendChild(courseAlertTitle);

                courseAlert = [];
                courseAlertName = [];
                courseAlertValue = [];
                courseAlertInfo = [
                    ['Trabalhos', event.target.course.getWorksNotificationNumber()], 
                    ['Questões', event.target.course.getQuestionsNotificationNumber()], 
                    ['Dúvidas', event.target.course.getDoubtsNotificationNumber()], 
                    ['Mural', event.target.course.getMuralNotificationNumber()]
                ];
                
                for(let count = 0; count < courseAlertInfo.length; count++)
                {
                    courseAlert[count] = document.createElement("div");
                    courseAlert[count].setAttribute("class","course-alert");
                    courseBody.appendChild(courseAlert[count]);

                        courseAlertName[count] = document.createElement("div");
                        courseAlertName[count].setAttribute("class","course-alert-name");
                        courseAlertName[count].innerHTML = courseAlertInfo[count][0];
                        courseAlert[count].appendChild(courseAlertName[count]);
                        
                        courseAlertValue[count] = document.createElement("div");
                        courseAlertValue[count].setAttribute("class","course-alert-value");
                        courseAlertValue[count].innerHTML = courseAlertInfo[count][1];
                        courseAlert[count].appendChild(courseAlertValue[count]);
                }
                
}