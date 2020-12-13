
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
        this.pathImage = 
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

    footCreateButton.addEventListener("click", function(course) {
        deleteCourtain();
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

                var title = document.createElement("div");
                title.innerHTML = course.getTitle(); 
                title.setAttribute("class", "create-course-details-title"); 
                header.appendChild(title);

                var subtitle = document.createElement("div");
                subtitle.innerHTML = course.getSubtitle();
                subtitle.setAttribute("class", "create-course-details-subtitle");    
                header.appendChild(subtitle);

            //Menu
            var menu = document.createElement("div");
            menu.setAttribute("class", "create-course-details-menu");    
            head.appendChild(menu);

                var informations = document.createElement("div");
                informations.innerHTML = "Informações Gerais";
                informations.setAttribute("class", "create-course-details-option");    
                menu.appendChild(informations);
    
                var resources = document.createElement("div");
                resources.innerHTML = "Materiais";
                resources.setAttribute("class", "create-course-details-option");       
                menu.appendChild(resources);

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

                boxWrapper[1] = document.createElement("div");
                boxWrapper[1].setAttribute("class", "create-course-details-body-information-box-half-wrapper");
                bodyInformation.appendChild(boxWrapper[1]);

            var bodyResources = document.createElement("div");
            bodyResources.setAttribute("class", "create-course-details-body-resources");
            body.appendChild(bodyResources);



    informations.addEventListener("click", function(){
        show(bodyInformation);
        hide(bodyResources);
    }); 
    resources.addEventListener("click", function(){
        show(bodyResources);
        hide(bodyInformation);
    }); 

    /*var headSelect = document.createElement("div");
    headSelect.setAttribute("class", "create-course-container-head-select");
    var options = [['Publico','publico'], ['Privado', 'privado']]
    createSelectOptions(headSelect, options);
    head.appendChild(headSelect);

    //BODY OF WINDOW OF COURSE CREATION
    
    

    var bodyInputsWrapper = document.createElement("div");
    bodyInputsWrapper.setAttribute("class", "create-course-container-body-inputs-wrapper");
    body.appendChild(bodyInputsWrapper);

    var bodyInputName = document.createElement("input");
    bodyInputName.setAttribute("type", "text");
    bodyInputName.setAttribute("placeholder", "Título do curso");
    bodyInputName.setAttribute("name", "courseName");
    bodyInputName.setAttribute("class", "create-course-container-body-name-input");
    bodyInputsWrapper.appendChild(bodyInputName);

    var bodyInputNumberModules = document.createElement("input");
    bodyInputNumberModules.setAttribute("type", "text");
    bodyInputNumberModules.setAttribute("placeholder", "Subtitulo do curso");
    bodyInputNumberModules.setAttribute("name", "courseNumberModules");
    bodyInputNumberModules.setAttribute("class", "create-course-container-body-number-modules-input");
    bodyInputsWrapper.appendChild(bodyInputNumberModules);*/
    
    



    appendCourtain(containerDetails);
}