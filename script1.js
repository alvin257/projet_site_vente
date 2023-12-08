$(document).ready(function () {
    loadMessages(); // Charge les messages existants lors du chargement de la page

    // Fonction pour envoyer un message en utilisant AJAX
    window.sendMessage = function () {
        var message = $("#message-input").val();
        if (message.trim() !== "") {
            $.post("sendMsg.php", { message: message }, function () {
                loadMessages(); // Recharge les messages après l'envoi
                $("#message-input").val(""); // Efface le champ de saisie
            });
        }
    };

    // Fonction pour charger les messages en utilisant AJAX
    function loadMessages() {
        $.get("getMsg.php", function (data) {
            $("#chat-window").html(data);
        });
    }

    // Recharge les messages toutes les x secondes
    setInterval(loadMessages, 10);
});
