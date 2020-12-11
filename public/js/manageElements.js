
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

    timelimit;
    timeduration;
    have_certification;
    have_tutor;

    constructor(title, subtitle) 
    {
        this.title = title;
        this.subtitle = subtitle;

        this.category = null;
        this.hournumber = null;
        this.description = null;

        this.timelimit = null;
        this.timeduration = null;
        this.have_certification = null;
        this.have_tutor = null;
    }
    getTitle()
    {
        return this.title;
    }
    getSubtitle()
    {
        return this.subtitle;
    }
    getCategory()
    {
        return this.category;
    }
    getHourNumber()
    {
        return this.hourNumber;
    }
    getDescription()
    {
        return this.description;
    }

    setTitle(title)
    {
        this.title = title;
    }
    setSubtitle(subtitle)
    {
        this.subtitle = subtitle;
    }
    setCategory(category)
    {
        this.category = category;
    }
    setHourNumber(hourNumber)
    {
        this.hourNumber = hourNumber;
    }
    setDescription(description)
    {
        this.description = description;
    }
}

function createCourseCreationWindow()
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

    /*var headSelect = document.createElement("div");
    headSelect.setAttribute("class", "create-course-container-head-select");
    var options = [['Publico','publico'], ['Privado', 'privado']]
    createSelectOptions(headSelect, options);
    head.appendChild(headSelect);*/

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
    footCancelButton.addEventListener("click", function() {
        deleteCourtain();
    });
    foot.appendChild(footCancelButton);

    var footCreateButton = document.createElement("input");
    footCreateButton.setAttribute("type", "button");
    footCreateButton.setAttribute("value", "Criar");
    footCreateButton.setAttribute("class", "create-course-container-foot-create-btn");
    footCreateButton.addEventListener("click", function() {
        deleteCourtain();
        var course = new Course(bodyInputTitle.value, bodyInputSubtitle.value);
        createCourseDetailsWindow(course);
    });
    foot.appendChild(footCreateButton);
    
    appendCourtain(container);
}

function createCourseDetailsWindow(course)
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