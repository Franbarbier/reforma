var global_propiedades;
var global_disenadores;
var global_localidades;
var global_usuarios;
var global_provincias = [{"nombre_completo":"Provincia de Misiones","fuente":"IGN","iso_id":"AR-N","nombre":"Misiones","id":"54","categoria":"Provincia","iso_nombre":"Misiones","centroide":{"lat":-26.8753965086829,"lon":-54.6516966230371}},{"nombre_completo":"Provincia de San Luis","fuente":"IGN","iso_id":"AR-D","nombre":"San Luis","id":"74","categoria":"Provincia","iso_nombre":"San Luis","centroide":{"lat":-33.7577257449137,"lon":-66.0281298195836}},{"nombre_completo":"Provincia de San Juan","fuente":"IGN","iso_id":"AR-J","nombre":"San Juan","id":"70","categoria":"Provincia","iso_nombre":"San Juan","centroide":{"lat":-30.8653679979618,"lon":-68.8894908486844}},{"nombre_completo":"Provincia de Entre Ríos","fuente":"IGN","iso_id":"AR-E","nombre":"Entre Ríos","id":"30","categoria":"Provincia","iso_nombre":"Entre Ríos","centroide":{"lat":-32.0588735436448,"lon":-59.2014475514635}},{"nombre_completo":"Provincia de Santa Cruz","fuente":"IGN","iso_id":"AR-Z","nombre":"Santa Cruz","id":"78","categoria":"Provincia","iso_nombre":"Santa Cruz","centroide":{"lat":-48.8154851827063,"lon":-69.9557621671973}},{"nombre_completo":"Provincia de Río Negro","fuente":"IGN","iso_id":"AR-R","nombre":"Río Negro","id":"62","categoria":"Provincia","iso_nombre":"Río Negro","centroide":{"lat":-40.4057957178801,"lon":-67.229329893694}},{"nombre_completo":"Provincia del Chubut","fuente":"IGN","iso_id":"AR-U","nombre":"Chubut","id":"26","categoria":"Provincia","iso_nombre":"Chubut","centroide":{"lat":-43.7886233529878,"lon":-68.5267593943345}},{"nombre_completo":"Provincia de Córdoba","fuente":"IGN","iso_id":"AR-X","nombre":"Córdoba","id":"14","categoria":"Provincia","iso_nombre":"Córdoba","centroide":{"lat":-32.142932663607,"lon":-63.8017532741662}},{"nombre_completo":"Provincia de Mendoza","fuente":"IGN","iso_id":"AR-M","nombre":"Mendoza","id":"50","categoria":"Provincia","iso_nombre":"Mendoza","centroide":{"lat":-34.6298873058957,"lon":-68.5831228183798}},{"nombre_completo":"Provincia de La Rioja","fuente":"IGN","iso_id":"AR-F","nombre":"La Rioja","id":"46","categoria":"Provincia","iso_nombre":"La Rioja","centroide":{"lat":-29.685776298315,"lon":-67.1817359694432}},{"nombre_completo":"Provincia de Catamarca","fuente":"IGN","iso_id":"AR-K","nombre":"Catamarca","id":"10","categoria":"Provincia","iso_nombre":"Catamarca","centroide":{"lat":-27.3358332810217,"lon":-66.9476824299928}},{"nombre_completo":"Provincia de La Pampa","fuente":"IGN","iso_id":"AR-L","nombre":"La Pampa","id":"42","categoria":"Provincia","iso_nombre":"La Pampa","centroide":{"lat":-37.1315537735949,"lon":-65.4466546606951}},{"nombre_completo":"Provincia de Santiago del Estero","fuente":"IGN","iso_id":"AR-G","nombre":"Santiago del Estero","id":"86","categoria":"Provincia","iso_nombre":"Santiago del Estero","centroide":{"lat":-27.7824116550944,"lon":-63.2523866568588}},{"nombre_completo":"Provincia de Corrientes","fuente":"IGN","iso_id":"AR-W","nombre":"Corrientes","id":"18","categoria":"Provincia","iso_nombre":"Corrientes","centroide":{"lat":-28.7743047046407,"lon":-57.8012191977913}},{"nombre_completo":"Provincia de Santa Fe","fuente":"IGN","iso_id":"AR-S","nombre":"Santa Fe","id":"82","categoria":"Provincia","iso_nombre":"Santa Fe","centroide":{"lat":-30.7069271588117,"lon":-60.9498369430241}},{"nombre_completo":"Provincia de Tucumán","fuente":"IGN","iso_id":"AR-T","nombre":"Tucumán","id":"90","categoria":"Provincia","iso_nombre":"Tucumán","centroide":{"lat":-26.9478001830786,"lon":-65.3647579441481}},{"nombre_completo":"Provincia del Neuquén","fuente":"IGN","iso_id":"AR-Q","nombre":"Neuquén","id":"58","categoria":"Provincia","iso_nombre":"Neuquén","centroide":{"lat":-38.6417575824599,"lon":-70.1185705180601}},{"nombre_completo":"Provincia de Salta","fuente":"IGN","iso_id":"AR-A","nombre":"Salta","id":"66","categoria":"Provincia","iso_nombre":"Salta","centroide":{"lat":-24.2991344492002,"lon":-64.8144629600627}},{"nombre_completo":"Provincia del Chaco","fuente":"IGN","iso_id":"AR-H","nombre":"Chaco","id":"22","categoria":"Provincia","iso_nombre":"Chaco","centroide":{"lat":-26.3864309061226,"lon":-60.7658307438603}},{"nombre_completo":"Provincia de Formosa","fuente":"IGN","iso_id":"AR-P","nombre":"Formosa","id":"34","categoria":"Provincia","iso_nombre":"Formosa","centroide":{"lat":-24.894972594871,"lon":-59.9324405800872}},{"nombre_completo":"Provincia de Jujuy","fuente":"IGN","iso_id":"AR-Y","nombre":"Jujuy","id":"38","categoria":"Provincia","iso_nombre":"Jujuy","centroide":{"lat":-23.3200784211351,"lon":-65.7642522180337}},{"nombre_completo":"Provincia de Buenos Aires","fuente":"IGN","iso_id":"AR-B","nombre":"Buenos Aires","id":"06","categoria":"Provincia","iso_nombre":"Buenos Aires","centroide":{"lat":-36.6769415180527,"lon":-60.5588319815719}},{"nombre_completo":"Provincia de Tierra del Fuego, Antártida e Islas del Atlántico Sur","fuente":"IGN","iso_id":"AR-V","nombre":"Tierra del Fuego","id":"94","categoria":"Provincia","iso_nombre":"Tierra del Fuego","centroide":{"lat":-82.52151781221,"lon":-50.7427486049785}}]
var global_cur_galeria;

// for (img in galeria) {
//     html += comp_img_carrousel(galeria[img])
//     htmlGaleriaExpand += imgs_galeria_grande(galeria[img])
// }
// function imgs_galeria_grande(img) {
//     return '<div class="galeria-grande carousel-cell"><img src="imgs/propiedades_imgs/' + img + '" alt=""></div>'
// }

// Funcion para generar ids
function get_identifier(){
    return Math.floor((Math.random() * 1000000) + 1);
}

function get_extension(file_name){
    var re = /(?:\.([^.]+))?$/;
    return re.exec(file_name)[0]
}

function get_object_by_id(id, objects){
    for(obj in objects){
        if(id == objects[obj].id){
            return objects[obj]
        }
    }
}



function row_propiedad(p) {

    if(p.galeria!=''){
        var thumbnail = JSON.parse(p.galeria)[0]
    }else{
        var thumbnail = ''
    }

    return `<div class="row-propiedad" data-id="${p.id}">
                <div>
                    <div class="foto-prop">
                        <img src="../imgs/propiedades_imgs/${thumbnail}">
                    </div>
                    <div class="nombre-prop">
                        <h3>${p.nombre}</h3>
                    </div>
                </div>
                <div class="options">
                    <a class="ver-prop" href="../apartado.php?id=${p.id}">
                        <img src="../imgs/view.svg">
                    </a>
                    <a class="editar-prop">
                        <img src="../imgs/pencil.svg">
                    </a>
                    <a class="delete-prop">
                        <img src="../imgs/delete.svg">
                    </a>
                </div>
            </div>`
}

function ver_propiedades(html) {
    $('aside li').removeClass('activeLi')
    $('#propiedades').addClass('activeLi')

    return `<div id="ver_propiedades">
                <div>
                    <h2>Propiedades</h2>
                    <button id="crear-propiedad">SUBIR PROPIEDAD</button>
                </div>
                <div>
                    ${html}
                </div>
            </div>`
}

// FUNCIONES DE DELETE

$(document).on('click', '.delete-prop', function () {
    let id = $(this).parents('.row-propiedad').attr('data-id')
    delete_prop(id)
})

function delete_prop(id) {
    console.log('id: '+id)
    var r = confirm("Desea eliminar esta propiedad?");
        if (r == true) {
            console.log('eliminado')
            fetch('../php/api/propiedades.php?func=eliminarPropiedad&id='+id) 
            .then(function (response) {
                return response.text();
            })
            .then(function (res) {
                console.log(res)
                
            });
        } else {
            console.log('cancelado')
        }
}

$(document).on('click', '.delete-user', function () {
    let id = $(this).parents('.row-usuario').attr('id')
    delete_user(id)
})

function delete_user(id) {
    var r = confirm("Desea eliminar este usuario?");
        if (r == true) {
            console.log('eliminado')

            fetch('../php/api/globales.php?func=eliminarUsuario&id='+id) 
            .then(function (response) {
                return response.text();
            })
            .then(function (res) {
                console.log(res)
                
            });



        } else {
            console.log('cancelado')
        }
}

$(document).on('click', '.eliminar-loc', function () {
    let id = $(this).closest('.row-localidad').attr('id')
    delete_localidad(id)
})

function delete_localidad(id) {
    var r = confirm("Desea eliminar esta localidad? id: "+ id);
        if (r == true) {
            console.log('eliminado')
            fetch('../php/api/globales.php?func=eliminarLocalidad&id='+id) 
            .then(function (response) {
                return response.json();
            })
            .then(function (res) {
                console.log(res)
                if(res.error==0){
                    window.location = ""
                }else{
                    alert('Ocurrió un error al eliminar esta localidad.')
                }
            });
        } else {
            console.log('cancelado')
        }
}

$(document).on('click', '.eliminar-artista', function () {
    let id = $(this).parents('.row-artista').attr('id')
    delete_artist(id)
})

function delete_artist(id) {
    var r = confirm("Desea eliminar este artista?");
        if (r == true) {
            console.log('eliminado')

            fetch('../php/api/globales.php?func=eliminarArtista&id='+id) 
            .then(function (response) {
                return response.json();
            })
            .then(function (res) {
                console.log(res)
                if(res.error==0){
                    window.location = ""
                }else{
                    alert('Ocurrió un error al eliminar este artista.')
                }
            });

            


        } else {
            console.log('cancelado')
        }
}

// TERMINA FUNCIONES DE DELETE


function li_ameniti(key, value, id, selected) {
    var clase = ''
    if(selected){
        clase = 'ameniti-selected'
    }
    return `<li class="${clase}" data-id="${id}"><img src="../${value}" alt=""><p>${key}</p></li>`
}

function nueva_propiedad(id) {

    global_cur_galeria = []

    var prop = {"amenities":"[]","banos":"","camas":"","concepto_espacio":"","coordenadas":"","distribucion_camas": "","galeria":"","huespedes":"","id":"", "id_disenador": "","id_localidad":"","localidad":"", "nombre":"","normas":"","politica":"","provincia":"","seguridad":"","tarifa":""}
    var btn_text = 'subir';
    var amenities = JSON.parse(prop.amenities)
    var latitud = ''
    var longitud = ''
    var html_imgs_preview = '<li>No hay archivos seleccionados.</li>'


    if (id != undefined) {
        prop = get_object_by_id(id, global_propiedades)
        console.log('Propiedad, la tenemos! ', prop)
        btn_text = 'actualizar'
        if(prop.amenities==''){
            prop.amenities = '[]'
        }
        amenities = JSON.parse(prop.amenities)
        // Parseamos a int el array
        for(val in amenities){
            amenities[val] = parseInt(amenities[val])
        }

        if(prop.coordenadas==''){
            prop.coordenadas = '[]'
        }
        var coordenadas = JSON.parse(prop.coordenadas)
        latitud = coordenadas[0]
        longitud = coordenadas[1]

        var html_dormitorios = '';
        var dormitorios = JSON.parse(prop.distribucion_camas)

        var c = 0;
        for(d in dormitorios){
            html_dormitorios += camas_dormitorios(c, dormitorios[d].descripcion, dormitorios[d].img)
            c+=1
        }

        if(prop.galeria == ''){
            prop.galeria = '[]'
        }
        var galeria = JSON.parse(prop.galeria)
        global_cur_galeria = galeria
        if(galeria.length>0){

            html_imgs_preview = '<ol>'
            for(i in galeria){
                html_imgs_preview += `
                <li style="position: relative">
                <div class="delete-prop-img" data-name="${galeria[i]}"><img src="../imgs/letter-x.svg" height="10px"></div>
                <div>
                <img src="../imgs/propiedades_imgs/${galeria[i]}">
                </div>
                <p>${galeria[i]}</p>
                </li>
                `
            }
            html_imgs_preview += '</ol>'
        }

        // {"dormitorio": "Dormitorio 1", "descripcion": "Cama matrimonial", "img": "double-bed"}
    }


    $('aside li').removeClass('activeLi')
    $('#propiedades').addClass('activeLi')
    let servicios = {
        'Cocina completa': 'imgs/icons/kitchen.svg',
        'Lavadora': 'imgs/icons/lavanderia.svg',
        'Secadora': 'imgs/icons/secador.svg',
        'Ascensor': 'imgs/icons/ascensor.svg',
        'Calefaccion': 'imgs/icons/heater.svg',
        'Aire Acondicionado': 'imgs/icons/air-conditioner.svg',
        'Bañera': 'imgs/icons/bath.svg',
        'Smart TV': 'imgs/icons/smart-tv.svg',
        'Pileta': 'imgs/icons/swimming.svg',
        'Gimnasio': 'imgs/icons/gym.svg',
        'Wifi': 'imgs/icons/wifi.svg',
        'Espacio para estudio/trabajo': 'imgs/icons/work-space.svg',
        'Aparcamiento gratuito en la calle':'imgs/icons/parking.svg',
        'Aparcamiento de pago fuera de las instalaciones':'imgs/icons/barrier.svg'
    }
    
    var html_amenities = '';

    var c = 0;
    for(s in servicios){
        c+=1;
        var selected = false;
        if(amenities.includes(c)){
            selected = true
        }
        html_amenities += li_ameniti(s, servicios[s], c, selected)
    }

    // 
    var html_localidades = ''
    for(l in global_localidades){
        var selected = ''
        loc = global_localidades[l]
        if(loc.id==prop.id_localidad){
            selected = 'selected'
        }
        html_localidades += `<option value="${loc.id}" ${selected}>${loc.nombre } (${loc.provincia})</option>`
    }

    var html_disenadores = ''
    for(d in global_disenadores){
        var selected = ''
        dis = global_disenadores[d]
        if(dis.id==prop.id_disenador){
            selected = 'selected'
        }
        html_disenadores += `<option value="${dis.id}" ${selected}>${dis.nombre}</option>`
    }
    
    // Object.entries(servicios).forEach(([key, value]) =>  html += li_ameniti( key, value ))
    
    // $('#amenities ul').append('<li><img src="../'+ value +'" alt=""><p>'+ key +'</p></li>')

    setTimeout(() => {
        gallery_uploader();
    }, 600);

    $(document).on('click', '.delete-prop-img', function(){
        
        if(confirm('Estás seguro que deseas eliminar esta imagen?')){

            console.log(global_cur_galeria)
            var index = global_cur_galeria.indexOf($(this).attr('data-name'));
            global_cur_galeria.splice(index, 1);
            console.log(global_cur_galeria)
            $(this).closest('li').remove()
        }


    })

    return `<div id="crear_propiedad">
                <div>
                    <h2>Nueva propiedad</h2>
                    <input id="p-id" value="${prop.id}" type="hidden">
                </div>
                <div>
                    <div id="n-nombre">
                        <label for="">Nombre</label>
                        <input class="grey-input" type="text" value="${prop.nombre}" id="p-nombre">
                    </div>
                    <div id="n-localidad">
                        <label for="">Localidad</label>
                        <select name="" class="grey-input" id="p-localidad">
                            ${html_localidades}
                        </select>
                    </div>
                    <div class="house-display">
                        <div>
                            <img src="../imgs/users-handmade.svg" alt="">
                            <p>Huespedes</p>
                            <input class="grey-input" min="1" type="number" value="${prop.huespedes}" id="p-huespedes">
                        </div>
                        <div>
                            <img src="../imgs/ducha-handmade.svg" alt="">
                            <p>Baños</p>
                            <input class="grey-input" min="1" type="number" value="${prop.banos}" id="p-banos">
                        </div>
                        <div id="dorms">
                            <img src="../imgs/cama-handmade.svg" alt="">
                            <p>Camas</p>
                            <input class="grey-input" min="1" type="number" value="${prop.camas}" id="p-camas">
                        </div>
                        <div id="n-camas">
                            ${html_dormitorios}                            
                        </div>
                    </div>
                    <div id="amenities">
                        <p>Amenities</p>
                        <ul>
                            ${html_amenities}
                        </ul>
                    </div>
                    <div id="concepto">
                        <p>Concepto</p>
                        <div class="grey-input" contenteditable="true" id="p-concepto_espacio">${prop.concepto_espacio}</div>
                    </div>
                    <div class="lasts">
                        <div>
                            <p>Diseñador</p>
                            <select class="grey-input" name="" id="p-disenador">
                            ${html_disenadores}
                            </select>
                        </div>
                        <div>
                            <p>Latitud</p>
                            <input class="grey-input" type="text" value="${latitud}" id="p-latitud">
                            <p>Longitud</p>
                            <input class="grey-input" type="text" value="${longitud}" id="p-longitud">
                            
                        </div>
                    </div>
                    <div class="lasts">

                       <!-- <div>
                            <p>Tarifa por Limpieza</p>

                            <div>
                                <span>$</span>
                                <input class="grey-input" min="1" type="number">
                            </div>
                        </div> -->

                        <div>
                            <p>Tarifa por noche</p>

                            <div>
                                <span>$</span>
                                <input class="grey-input" min="1" type="number" value="${prop.tarifa}" id="p-tarifa">
                            </div>
                        </div>
                    </div>
                    <div>
                        <div id="modal-add-img">
                            <div>
                                <div>
                                    <h4>Selecciona o arrastra las imagenes</h4>
                                    <div id="">
                                        <label for="image_uploads" id="label-imgs">
                                            <input type="file" id="image_uploads" name="image_uploads" accept=".jpg, .jpeg, .png" multiple>
                                        </label>
                                        <div class="preview">
                                            ${html_imgs_preview}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div id="upload_thumbnail">
                            <h4>Imagen principal/thumbnail</h4>
                            <div class="profile-img">
                                <input type="file" id="myFile2" onchange="loadFile2(event)" name="filename" accept="image/*">
                                <img src="" alt="" id="p-pic2" class="p-pic">
                                <label for="myFile2"></label>
                            </div> -->
                        </div>
                    </div>
                    <div id="buttons-cont">
                        <button class="grey-input" id="descartar-cambios">DESCARTAR CAMBIOS</button>
                        <button id="${btn_text}-propiedad">${btn_text} propiedad</button>
                    </div>
                </div>
            </div>`
}

var files_to_upload = []


function gallery_uploader() {
    
    // validacion del subidor de archivos multiples
    var inputFiles = document.getElementById('image_uploads');
    var preview = document.querySelector('.preview');

    // inputFiles.style.opacity = 0;

    inputFiles.addEventListener('change', updateImageDisplay);

    function updateImageDisplay() {

        files_to_upload = []


        while (preview.firstChild) {
            preview.removeChild(preview.firstChild);
        }

        const curFiles = inputFiles.files;
        if (curFiles.length === 0) {
            const para = document.createElement('p');
            para.textContent = 'No files currently selected for upload';
            preview.appendChild(para);
        } else {
            const list = document.createElement('ol');
            preview.appendChild(list);

            for (const file of curFiles) {

                files_to_upload.push(file)

                const listItem = document.createElement('li');
                const imgCont = document.createElement('div');
                const para = document.createElement('p');

                if (validFileType(file)) {
                    para.textContent = `${file.name}`;
                    const image = document.createElement('img');
                    image.src = URL.createObjectURL(file);
                    if (file.type === 'application/pdf') {
                        image.src = 'https://www.flaticon.com/svg/static/icons/svg/46/46438.svg';
                    }

                    listItem.append(imgCont);
                    imgCont.append(image);
                    listItem.appendChild(para);
                } else {
                    para.textContent = `${file.name} No es un archivo valido. Pruebe otro archivo.`;
                    listItem.appendChild(para);
                }

                list.appendChild(listItem);
            }
        }
    }

    // https://developer.mozilla.org/en-US/docs/Web/Media/Formats/Image_types
    const fileTypes = [
        'image/apng',
        'image/bmp',
        'image/gif',
        'image/jpeg',
        'image/pjpeg',
        'image/png',
        'image/svg+xml',
        'image/tiff',   
        'image/webp',
        `image/x-icon`,
        'application/pdf'
    ];

    function validFileType(file) {
        return fileTypes.includes(file.type);
    }

    function returnFileSize(number) {
        if (number < 1024) {
            return number + 'bytes';
        } else if (number > 1024 && number < 1048576) {
            return (number / 1024).toFixed(1) + 'KB';
        } else if (number > 1048576) {
            return (number / 1048576).toFixed(1) + 'MB';
        }
    }
    // termina: validacion del subidor de archivos multiples
}

$(document).on('click', '#amenities li', function () {
    $(this).toggleClass('ameniti-selected')
})

function camas_dormitorios(index, descripcion='', img='') {
    return `<div class="dormitorio">
                <p id="dormitorio${index+1}">Dormitorio ${index+1}</p>
                <div>
                    ${tipo_de_cama(descripcion, img)}
                </div>
                <!-- <span>Agregar cama en el dormitorio...</span> -->
            </div>`
}

function tipo_de_cama(descripcion='', img='') {

    var imgs = ['double-bed', 'single-bed', 'sofa']
    var html_imgs = ''
    for(i in imgs){
        var selected = ''
        if(imgs[i]==img){
            selected = 'selected'
        }
        html_imgs += `<option value="${imgs[i]}" ${selected}>${imgs[i]}</option>`
    }

    return `<div class="camas-en-dormis">
                <div class="delete-bed"><img src="../imgs/letter-x.svg"></div>
                <input class="grey-input dormi-descri" style="width:155px" value="${descripcion}">
                <select class="grey-input cama-img" name="">
                ${html_imgs}
                </select>
            </div>`
}


$(document).on('change', '#dorms input', function () {
    console.log(parseInt($(this).val()))
    var rooms = parseInt($(this).val())
    rooms -= $('.dormitorio').length
    var html = '';
    for (let c = 0; c < rooms; c++) {
        var index = $('.dormitorio').length
        $('#n-camas').append(camas_dormitorios(index))
    }
    console.log(html)

})
$(document).on('click', '.dormitorio>span', function () {
    $(this).parent().find('>div').append(tipo_de_cama()   )
 }) 


$(document).on('click', '.delete-bed', function () {
    $(this).closest('.dormitorio').remove();
    $('.dormitorio').each(function(){
        var num_dorm = $(this).index()+1
        $(this).find('p').html('Dormitorio ' + num_dorm)
    })
})



function row_usuario(user) {

    var clase = ''
    if(user.estado==0){
        clase = 'us-inactive'
    }

    return `<div id="${user.id}" class="row-usuario ${clase}">
                <div>
                    <div class="id-usuario">
                        <p>${user.id}</p>
                    </div>
                    <div class="nombre-usuario">
                        <p>${user.nombre} ${user.apellido}</p>
                    </div>
                    <div class="mail-usuario">
                        <p>${user.mail}</p>
                    </div>
                </div>
                <div class="options">
                    <a class="ver-usuario">
                        <img src="../imgs/view.svg">
                    </a>
                    <a class="delete-user">
                        <img src="../imgs/delete.svg">
                    </a>
                </div>
            </div>`
}

function ver_usuarios(html) {
    $('aside li').removeClass('activeLi')
    $('#usuarios').addClass('activeLi')

    return `<div id="ver_usuarios">
                <div>
                    <h2>Usuarios</h2>
                    <!-- <button id="crear-usuario">CREAR USUARIO</button> -->
                </div>
                <div>
                    ${html}
                </div>
            </div>`
}

function row_localidad(loc) {
    return `<div id="${loc.id}" class="row-localidad">
                <div>
                    <div class="id-loc">
                        <p>${loc.id}</p>
                    </div>
                    <div class="nombre-loc">
                        <p>${loc.nombre}</p>
                    </div>
                    <div class="nombre-prov">
                        <p>${loc.provincia}</p>
                    </div>
                </div>
                <div class="options">
                    <a class="editar-loc">
                        <img src="../imgs/pencil.svg">
                    </a>
                    <a class="eliminar-loc">
                        <img src="../imgs/delete.svg">
                    </a>
                </div>
            </div>`
}


function ver_localidades() {
    $('aside li').removeClass('activeLi')
    $('#localidades').addClass('activeLi')
    var html_localidades = '';
    for (l in global_localidades) {
        loc = global_localidades[l]
        html_localidades += row_localidad(loc)
    }

    return `<div id="ver_localidades">
                <div>
                    <h2>Localidades</h2>
                    <button id="crear-nueva-localidad">NUEVA LOCALIDAD</button>
                </div>
                <div>
                    ${html_localidades}
                </div>
            </div>`
}


// Componente main modal editar artistas
function modal_crear_localidad(){
    
    var html_provincias = ''
    for(p in global_provincias){
        var prov = global_provincias[p]
        html_provincias += `<option data-name="${prov.nombre}" value="${prov.nombre}">${prov.nombre}</option>`
    }
    

    $(document).on('click', '#crear-nueva-localidad', function(){
        $('#crear-localidad-modal').fadeIn(100)
    })
    $(document).on('click', '#crear-localidad-modal .descartar-cambios, #crear-localidad-modal .mm-cerrar', function(){
        $('#crear-localidad-modal').fadeOut(100)
    })

    $(document).on('click', '#crear-localidad-modal', function(e){
        e.stopPropagation()
    })

    $(document).on('click', '#crear-localidad-modal .guardar-cambios', function(e){
        console.log('holu')
        e.stopPropagation()
        var nombre = $('#mcl-nombre').val()
        var provincia = $('#mcl-provincia').val()

        $.ajax({
            url:'../php/api/globales.php?func=crearLocalidad',
            method:'POST',
            cache: false,
            data:{
                nombre,
                provincia
            },
            dataType:'json',
            success:function(res){
                console.log(res)
                if(res.error==0){
                    window.location = ""
                }else{
                    alert('Ocurrió un error al intentar añadir la localidad.')
                }

            }
        });
    })

    

    return `<div id="crear-localidad-modal" class="m-modal">
                <div>
                    <div class="mm-cerrar">x</div>

                    
                    <div class="mm-heading">
                        <h5>Crear localidad</h5>
                        <input class="grey-input" type="text" placeholder="Nueva localidad" id="mcl-nombre">
                        <select class="grey-input" id="mcl-provincia">
                        ${html_provincias}
                        </select>
                    </div>
                    <aside class="save-buttons">
                        <button class="descartar-cambios">DESCARTAR</button>
                        <button class="guardar-cambios">CREAR</button>
                    </aside>
                </div>
            </div>` 
}



function row_artista(dis) {
    return `<div id="${dis.id}" class="row-artista">
                <div>
                    <div class="id-artista">
                        <p>${dis.id}</p>
                    </div>
                    <div class="foto-artista">
                        <img src="../imgs/disenadores/${dis.img}">
                    </div>
                    <div class="nombre-artista">
                        <p>${dis.nombre}</p>
                    </div>
                </div>
                <div class="options">
                    <a class="editar-artista">
                        <img src="../imgs/pencil.svg">
                    </a>
                    <a class="eliminar-artista">
                        <img src="../imgs/delete.svg">
                    </a>
                </div>
            </div>`
}


function ver_artistas() {
    $('aside li').removeClass('activeLi')
    $('#artistas').addClass('activeLi')

    var html_disenadores = ''
    for(d in global_disenadores){
        dis = global_disenadores[d]
        html_disenadores += row_artista(dis)
    }

    return `<div id="ver_artistas">
                <div>
                    <h2>Artistas</h2>
                    <button id="crear-artista">NUEVO ARTISTA</button>
                </div>
                <div>
                    ${html_disenadores}
                </div>
            </div>`
}


// Componente main modal editar artistas
function modal_edit_artista(){

    $(document).on('click', '.editar-artista', function(){

        var id = $(this).closest('.row-artista').attr('id')
        var este_disenador = get_object_by_id(id, global_disenadores)
        $('#md-nombre').html(este_disenador.nombre)
        $('#md-descripcion').html(este_disenador.descripcion)
        $('#md-id').val(este_disenador.id)
        $('#md-img_name').val(este_disenador.img)
        $('#p-pic').attr('src', '../imgs/disenadores/'+este_disenador.img)



        $('#edit-artista-modal').fadeIn(100)

    })
    $(document).on('click', '#edit-artista-modal .descartar-cambios, #edit-artista-modal .mm-cerrar', function(){
        $('#edit-artista-modal').fadeOut(100)
    })

    $(document).on('click', '#edit-artista-modal', function(e){
        e.stopPropagation()
    })

    $(document).on('click', '#edit-artista-modal .guardar-cambios', function(){
        console.log('clicked!')

        var id = $('#md-id').val()
        var nombre = $('#md-nombre').html()
        var descripcion = $('#md-descripcion').html()
        var img_name = $('#md-img_name').val()

        var profile_pic = $('#edit-artista-modal #myFile')[0].files

        // Si efectivamente se modificó la imagen, subimos la nueva
        if(profile_pic.length>0){

            console.log(profile_pic)
            var fd = new FormData();
            fd.append('file',profile_pic[0]);
            img_name = profile_pic[0].name
            
            fetch('../subir_imgs.php?func=subirImgArtista', {
                method: 'post',
                body: fd
            }).then(function(response) {
                return response.text()
            }).then(function(res) {
                console.log(res);
            });
        }
            
        console.log('nombre: ', nombre, ' descripcion: ', descripcion, ' id: ', id)

        $.ajax({
            url:'../php/api/globales.php?func=actualizarDisenador',
            method:'POST',
            cache: false,
            data:{
                id,
                nombre,
                descripcion,
                img_name
            },
            dataType:'json',
            success:function(res){
                console.log(res)
                if(res.error==0){
                    window.location = ''
                }
            }
        });



    })

    

    return `<div id="edit-artista-modal" class="m-modal">
                <div>
                    <div class="mm-cerrar">x</div>

                    
                    <div class="mm-heading">

                    <input type="hidden" id="md-img_name">
                    <input type="hidden" id="md-id">
                        <div class="profile-img">
                            <input type="file" id="myFile" onchange="loadFile(event)" name="filename" accept="image/*">
                            <img src="../imgs/no-user-pic.jpg" alt="" id="p-pic" class="p-pic">
                            <label for="myFile"></label>
                        </div>
                        <h4 contenteditable class="mm-titulo" id="md-nombre"></h4>
                    </div>
                    <div>
                        <div id="md-descripcion" contenteditable="true"></div>
                    </div>
                    <aside class="save-buttons">
                        <button class="descartar-cambios">DESCARTAR</button>
                        <button class="guardar-cambios">GUARDAR</button>
                    </aside>
                </div>
            </div>` 
}

// Componente main modal crear artistas
function modal_crear_artista(){

    $(document).on('click', '#crear-artista', function(){
        $('#crear-artista-modal').fadeIn(100)
    })
    $(document).on('click', '#crear-artista-modal .descartar-cambios, #crear-artista-modal .mm-cerrar', function(){
        $('#crear-artista-modal').fadeOut(100)
    })

    $(document).on('click', '#crear-artista-modal', function(e){
        e.stopPropagation()
    })

    $(document).on('click', '#crear-artista-modal .guardar-cambios', function(){
        console.log('clicked!')
        var nombre = $('#mcd-nombre').val()
        var descripcion = $('#mcd-descripcion').val()

        var profile_pic = $('#crear-artista-modal #myFile2')[0].files
        var img_name = ''

        if(profile_pic.length>0){

            console.log(profile_pic)
            var fd = new FormData();
            img_name = profile_pic[0].name
            img_name = get_identifier() + get_extension(img_name)
            fd.append('file',profile_pic[0], img_name);
            

            console.log('img name: ', img_name)

            fetch('../subir_imgs.php?func=subirImgArtista', {
                method: 'post',
                body: fd
            }).then(function(response) {
                return response.text()
            }).then(function(res) {
                console.log(res);
            });
        }

        if(nombre!=''){
            
            $.ajax({
                url:'../php/api/globales.php?func=crearArtista',
                method:'POST',
                cache: false,
                data:{
                    nombre,
                    descripcion,
                    img_name
                },
                dataType:'json',
                success:function(res){
                    console.log(res)
                    if(res.error==0){
                        window.location = ''
                    }
                }
            });
            
        }else{
            alert('Debes introducir un nombre al artista.')
        }


    })

    

    return `<div id="crear-artista-modal" class="m-modal">
                <div>
                    <div class="mm-cerrar">x</div>

                    
                    <div class="mm-heading">
                        <div class="profile-img">
                            <input type="file" id="myFile2" onchange="loadFile2(event)" name="filename" accept="image/*">
                            <img src="../imgs/no-user-pic.jpg" alt="" id="p-pic2" class="p-pic">
                            <label for="myFile2"></label>
                        </div>
                        <input type="text" class="grey-input" placeholder="Nombre del artista" id="mcd-nombre">
                    </div>
                    <div>
                        <textarea placeholder="Sobre el artista..." id="mcd-descripcion"></textarea>
                    </div>
                    <aside class="save-buttons">
                        <button class="descartar-cambios">DESCARTAR</button>
                        <button class="guardar-cambios">GUARDAR</button>
                    </aside>
                </div>
            </div>` 
}


// Componente main modal editar lcoalidades
function modal_edit_localidad(){

    var html_provincias = ''
    for(p in global_provincias){
        var prov = global_provincias[p]
        html_provincias += `<option data-name="${prov.nombre}" value="${prov.nombre}">${prov.nombre}</option>`
    }
    $(document).on('click', '.editar-loc', function(){
        $('#edit-localidad-modal').fadeIn(100)
        var id = $(this).closest('.row-localidad').attr('id')
        var esta_localidad = get_object_by_id(id, global_localidades)
        console.log('esta localidad: ', esta_localidad)

        $('#ml-id').val(esta_localidad.id)
        $('#ml-nombre').val(esta_localidad.nombre)
        $( "#ml-provincia option[data-name='"+esta_localidad.provincia+"']" ).attr('selected', true)


    })
    $(document).on('click', '#edit-localidad-modal .descartar-cambios, #edit-localidad-modal .mm-cerrar', function(){
        $('#edit-localidad-modal').fadeOut(100)
    })

    $(document).on('click', '#edit-localidad-modal', function(e){
        e.stopPropagation()
    })

    $(document).on('click', '#edit-localidad-modal .guardar-cambios', function(e){

        var nombre = $('#ml-nombre').val()
        var provincia = $('#ml-provincia').val()
        var id = $('#ml-id').val()

        $.ajax({
            url:'../php/api/globales.php?func=actualizarLocalidad',
            method:'POST',
            cache: false,
            data:{
                id,
                nombre,
                provincia
            },
            dataType:'json',
            success:function(res){
                console.log(res)
                if(res.error==0){
                    window.location = ''
                }
            }
        });

    })

    

    return `<div id="edit-localidad-modal" class="m-modal">
                <div>
                    <div class="mm-cerrar">x</div>

                    
                    <div class="mm-heading">
                        <h5>Editar localidad</h5>
                        <input type="hidden" id="ml-id">
                        <input class="grey-input" type="text" value="" id="ml-nombre">
                        <select class="grey-input" id="ml-provincia">
                            ${html_provincias}
                        </select>
                    </div>
                    <aside class="save-buttons">
                        <button class="descartar-cambios">DESCARTAR</button>
                        <button class="guardar-cambios">GUARDAR</button>
                    </aside>
                </div>
            </div>` 
}

function actualizar_propiedad(){

    var id = $('#p-id').val()
    var nombre = $('#p-nombre').val()
    var id_localidad = $('#p-localidad').val()
    var huespedes = $('#p-huespedes').val()
    var banos = $('#p-banos').val()
    var camas = $('#p-camas').val()
    
    var concepto_espacio = $('#p-concepto_espacio').html()
    var distribucion_camas = []
    $('.dormitorio').each(function(){
        var des = $(this).find('.dormi-descri').val()
        var img = $(this).find('.cama-img').val()
        distribucion_camas.push({"descripcion":des,"img":img})
    })
    distribucion_camas = JSON.stringify(distribucion_camas)
    var amenities = []
    $('#amenities li').each(function(){
        if($(this).hasClass('ameniti-selected')){
            amenities.push($(this).attr('data-id'))
        }
    })
    amenities = JSON.stringify(amenities)
    
    var id_disenador = $('#p-disenador').val()
    var latitud = $('#p-latitud').val()
    var longitud = $('#p-longitud').val()
    var tarifa = $('#p-tarifa').val()
    var coordenadas = [latitud, longitud]
    coordenadas = JSON.stringify(coordenadas)

    var galeria = JSON.stringify(global_cur_galeria)

    console.log('nombre: ', nombre, ', id_localidad: ', id_localidad, ', huespedes: ', huespedes, ', banos: ', banos, ', camas: ', camas, ', concepto espacio: ', concepto_espacio, ', id_disenador: ', id_disenador, ', latitud: ', latitud, ', longitud: ', longitud, ', tarifa: ', tarifa, ', distribucion camas: ', distribucion_camas, ', amenities: ', amenities)

    $.ajax({
        url:'../php/api/propiedades.php?func=actualizarPropiedad',
        method:'POST',
        cache: false,
        data:{
            id,
            nombre,
            id_localidad,
            huespedes,
            banos,
            camas,
            concepto_espacio,
            distribucion_camas,
            amenities,
            id_disenador,
            coordenadas,
            tarifa,
            galeria
        },
        dataType:'json',
        success:function(res){
            console.log(res)
            if(res.error==0){
                window.location = ''
            }
        }
    });

}


function subir_propiedad(){

    var nombre = $('#p-nombre').val()
    var id_localidad = $('#p-localidad').val()
    var huespedes = $('#p-huespedes').val()
    var banos = $('#p-banos').val()
    var camas = $('#p-camas').val()
    
    var concepto_espacio = $('#p-concepto_espacio').html()
    var distribucion_camas = []
    $('.dormitorio').each(function(){
        var des = $(this).find('.dormi-descri').val()
        var img = $(this).find('.cama-img').val()
        distribucion_camas.push({"descripcion":des,"img":img})
    })
    distribucion_camas = JSON.stringify(distribucion_camas)
    var amenities = []
    $('#amenities li').each(function(){
        if($(this).hasClass('ameniti-selected')){
            amenities.push($(this).attr('data-id'))
        }
    })
    amenities = JSON.stringify(amenities)
    
    var id_disenador = $('#p-disenador').val()
    var latitud = $('#p-latitud').val()
    var longitud = $('#p-longitud').val()
    var tarifa = $('#p-tarifa').val()
    var coordenadas = [latitud, longitud]
    coordenadas = JSON.stringify(coordenadas)

    console.log('nombre: ', nombre, ', id_localidad: ', id_localidad, ', huespedes: ', huespedes, ', banos: ', banos, ', camas: ', camas, ', concepto espacio: ', concepto_espacio, ', id_disenador: ', id_disenador, ', latitud: ', latitud, ', longitud: ', longitud, ', tarifa: ', tarifa, ', distribucion camas: ', distribucion_camas, ', amenities: ', amenities)

    var prop_imgs = $('#image_uploads')[0].files
    var galeria = [];

    for(i in prop_imgs){
        if(prop_imgs[i].size!=undefined){

            var p_img = prop_imgs[i]
            img_name = p_img.name
            img_name = get_identifier() + get_extension(img_name)
            galeria.push(img_name)
            console.log('putin: ', p_img)
        }

    }

    galeria = JSON.stringify(galeria)

    console.log('galeria: ', galeria)

    $.ajax({
        url:'../php/api/propiedades.php?func=subirPropiedad',
        method:'POST',
        cache: false,
        data:{
            nombre,
            id_localidad,
            huespedes,
            banos,
            camas,
            concepto_espacio,
            distribucion_camas,
            amenities,
            id_disenador,
            coordenadas,
            tarifa,
            galeria
        },
        dataType:'json',
        success:function(res){
            console.log(res)
            if(res.error==0){
                // window.location = ''

            // Empieza script de suba de imagenes
            if(prop_imgs.length>0){

                for(i in prop_imgs){

                    // Este conficional evita que se itere sobre un no archivo
                    if(prop_imgs[i].size!=undefined){
                        
                        var p_img = prop_imgs[i]
                        console.log(p_img)
                        var fd = new FormData();
                        fd.append('file',p_img, JSON.parse(galeria)[i]);
                        
                        fetch('../subir_imgs.php?func=subirImgPropiedad', {
                            method: 'post',
                            body: fd
                        }).then(function(response) {
                            return response.text()
                        }).then(function(res) {
                            console.log(res);
                        });

                    }
                }

            }
            // Termina script de suba de imagenes

            }
        }
    });

}

// Componente main modal editar artistas
function modal_ver_usuario(){

    $(document).on('click', '.ver-usuario', function(){

        // Inicializamos el modal
        var id_usuario = $(this).closest('.row-usuario').attr('id')
        console.log('idusuario: ', id_usuario)
        var este_usuario = get_object_by_id(id_usuario, global_usuarios)
        console.log('este usuario: ', este_usuario)
        $('#mu-id').val(este_usuario.id)
        $('#mu-nombre').val(este_usuario.nombre)
        $('#mu-apellido').val(este_usuario.apellido)
        $('#mu-telefono').val(este_usuario.telefono)
        $('#mu-mail').val(este_usuario.mail)
        $('#mu-pais').val(este_usuario.pais)
        $('#mu-fecha-nacimiento').val(este_usuario.fecha_nacimiento)
        var estado = 'Activo'
        if(este_usuario.estado==0){
            estado = 'Inactivo'
        }
        $('#mu-estado').val(estado)

        $('#ver-usuario-modal').fadeIn(100)
    })
    $(document).on('click', '#ver-usuario-modal .descartar-cambios, #ver-usuario-modal .mm-cerrar', function(){
        $('#ver-usuario-modal').fadeOut(100)
    })

    $(document).on('click', '#ver-usuario-modal', function(e){
        e.stopPropagation()
    })

    

    return `<div id="ver-usuario-modal" class="m-modal">
                <div>
                    <div class="mm-cerrar">x</div>

                    
                    <div class="mm-heading">
                        <div class="datos-inputs-cont">
                            <label>ID</label>
                            <input disabled type="text" value="" id="mu-id">
                        </div>
                        <div class="datos-inputs-cont">
                            <label>Nombre</label>
                            <input disabled type="text" value="Nombre" id="mu-nombre">
                        </div>
                        <div class="datos-inputs-cont">
                            <label>Apellido</label>
                            <input disabled type="text" value="Apellido" id="mu-apellido">
                        </div>
                        <div class="datos-inputs-cont">
                            <label>Fecha de nacimiento</label>
                            <input disabled type="text" value="03/03/1198" id="mu-fecha-nacimiento">
                        </div>
                        <div class="datos-inputs-cont">
                            <label>Telefono</label>
                            <input disabled type="text" value="11 3453-6398" id="mu-telefono">
                        </div>
                        <div class="datos-inputs-cont">
                            <label>Mail</label>
                            <input disabled type="text" value="ejemplo@email.com" id="mu-mail">
                        </div>
                        <div class="datos-inputs-cont">
                            <label>País</label>
                            <input disabled type="text" value="Argentina" id="mu-pais">
                        </div>
                        <div class="datos-inputs-cont">
                            <label>Estado</label>
                            <input disabled type="text" value="" id="mu-estado">
                        </div>
                    </div>
                    <div>
                        
                    </div>
                    
                </div>
            </div>` 
}

// Componente main modal editar artistas
function modal_crear_usuario(){

    $(document).on('click', '#crear-usuario', function(){
        $('#crear-usuario-modal').fadeIn(100)
    })
    $(document).on('click', '#crear-usuario-modal .descartar-cambios, #crear-usuario-modal .mm-cerrar', function(){
        $('#crear-usuario-modal').fadeOut(100)
    })

    $(document).on('click', '#crear-usuario-modal', function(e){
        e.stopPropagation()
    })

    
    return `<div id="crear-usuario-modal" class="m-modal">
                <div>
                    <div class="mm-cerrar">x</div>

                    
                    <div class="mm-heading">
                        <div>
                            <label>Nombre</label>
                            <input class="grey-input" type="text">
                        </div>
                        <div>
                            <label>Apellido</label>
                            <input class="grey-input" type="text">
                        </div>
                        <div>
                            <label>Fecha de nacimiento</label>
                            <input class="grey-input" type="date">
                        </div>
                        <div>
                            <label>Telefono</label>
                            <input class="grey-input" type="tel">
                        </div>
                        <div>
                            <label>Mail</label>
                            <input class="grey-input" type="email">
                        </div>
                        <div>
                            <label>País</label>
                            <select class="grey-input">
                                <option>Argentina</option>
                                <option>Argentina</option>
                                <option>Argentina</option>
                                <option>Argentina</option>
                                <option>Argentina</option>
                            </select>
                        </div>
                        <div>
                            <label>Contraseña</label>
                            <input class="grey-input" type="password">
                        </div>
                        <div>
                            <label>Repetir contraseña</label>
                            <input class="grey-input" type="password">
                        </div>
                    </div>
                    <aside class="save-buttons">
                        <button class="descartar-cambios">DESCARTAR</button>
                        <button class="guardar-cambios">GUARDAR</button>
                    </aside>
                    
                </div>
            </div>` 
}


var loadFile2 = function(event) {
	$('#p-pic2').attr('src', URL.createObjectURL(event.target.files[0])) ;
    console.log(URL.createObjectURL(event.target.files[0]))
};
var loadFile = function(event) {
	$('#p-pic').attr('src', URL.createObjectURL(event.target.files[0])) ;
    console.log(URL.createObjectURL(event.target.files[0]))
};


