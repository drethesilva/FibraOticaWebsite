function GetContent() {
    $("#Loader").show();
    $.post('../Handlers/BackOfficeGeralHandlers.php?action=GetContent', function (response) {
        JSON.parse(response).forEach(element => {
            $("#Content").append(
                "<div class='main-div' id='DivParent_" + element.id + "' type='" + element.typeContent + "'>" +
                "<h2>" + element.nome + "</h2>" +
                "</div>"
            );

            element.Conteudo.forEach(nomedoficheiro => {
                var teste = WichType(nomedoficheiro);
                switch (teste) {
                    case TypeExtensionEnum.jpg:
                        $("#DivParent_" + element.id).append("<i class='fas fa-images'></i><div > <img src='../Files/FilesSended/" + nomedoficheiro + "' alt='" + element.nome + " image'> </div>");
                        break;
                    case TypeExtensionEnum.png:
                        $("#DivParent_" + element.id).append("<i class='fas fa-images'></i><div > <img src='../Files/FilesSended/" + nomedoficheiro + "' alt='" + element.nome + " image'> </div>");
                        break;
                    case TypeExtensionEnum.gif:
                        $("#DivParent_" + element.id).append("<i class='fas fa-images'></i><div > <img src='../Files/FilesSended/" + nomedoficheiro + "' alt='" + element.nome + " image'> </div>");
                        break;
                    case TypeExtensionEnum.pdf:
                        $("#DivParent_" + element.id).append("<i class='fas fa-link'></i><a href='../Files/FilesSended/" + nomedoficheiro + "'>Link para o pdf</a>");
                        break;
                    case TypeExtensionEnum.mp4:
                        $("#DivParent_" + element.id).append("<i class='fas fa-film'></i><video controls><source src='../Files/FilesSended/" + nomedoficheiro + "' type='video/mp4'></video>");
                        break;
                    case TypeExtensionEnum.xlsx:
                        $("#DivParent_" + element.id).append("<i class='fas fa-link'></i><a class='' href='../Files/FilesSended/" + nomedoficheiro + "'>Link para o Excell</a>");
                        break;
                    default:
                        $("#DivParent_" + element.id).append("<i class='fas fa-link'></i><a class='' href='../Files/FilesSended/" + nomedoficheiro + "'>Link para o Ficheiro</a>");
                }
            });

            if(element.descricao != " "){
                $("#DivParent_" + element.id).append("<h4>Texto Adicional:</h4><p>" + element.descricao + "</p>");
            }

        });
        $("#Loader").hide();
    });
}

function WichType(ContentName) {
    return ContentName.substr((ContentName.lastIndexOf('.') + 1));
}

function ChangedSortValue() {
    var ValueSorted = $('#SortBy').find(":selected").val();
    if (ValueSorted != "all") {
        $('#Content').children().each(function () {
            if ($(this).attr("type") == ValueSorted) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    } else {
        $('#Content').children().show();
    }
}

var TypeExtensionEnum = {
    jpg: "jpg",
    png: "png",
    gif: "gif",
    pdf: "pdf",
    mp4: "mp4",
    xlsx: "xlsx"
};