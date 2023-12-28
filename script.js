// Fonction pour vérifier si une chaîne est vide
function isEmpty(str) {
    return str.trim() === '';
}

// Fonction pour vérifier le format d'une adresse email
function isValidEmail(email) {
    // Utilisation d'une expression régulière simple pour la démonstration
    // Vous pouvez utiliser une expression régulière plus robuste pour la validation des e-mails
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Fonction pour vérifier la complexité du mot de passe
function isValidPassword(password) {
    // Utilisation d'expressions régulières pour vérifier la complexité du mot de passe
    const letterRegex = /[a-zA-Z]/;
    const digitRegex = /\d/;
    const specialCharRegex = /[!@#$%^&*(),.?":{}|<>]/;

    return (
        letterRegex.test(password) &&
        digitRegex.test(password) &&
        specialCharRegex.test(password)
    );
}

// Fonction pour vérifier si les mots de passe correspondent
function passwordsMatch(password1, password2) {
    return password1 === password2;
}

// Fonction pour mettre à jour la couleur du champ et afficher un message
function updateFieldStatus(field, isValid, message) {
    const fieldElement = document.getElementById(field);
    const messageElement = document.getElementById(`${field}-message`);

    if (isValid) {
        fieldElement.style.borderColor = 'green';
        messageElement.style.color = 'green';
    } else {
        fieldElement.style.borderColor = 'red';
        messageElement.style.color = 'red';
        messageElement.innerText = message;
    }
}

// Fonction pour vérifier tous les champs avant de soumettre le formulaire
function checkForm() {
    const nom = document.getElementById('nom').value;
    const prenom = document.getElementById('prenom').value;
    const adresse = document.getElementById('adresse').value;
    const mail = document.getElementById('mail').value;
    const mdp1 = document.getElementById('mdp1').value;
    const mdp2 = document.getElementById('mdp2').value;

    // Vérifier chaque champ
    const isNomValid = !isEmpty(nom);
    const isPrenomValid = !isEmpty(prenom);
    const isAdresseValid = !isEmpty(adresse);
    const isMailValid = isValidEmail(mail);
    const isMdp1Valid = isValidPassword(mdp1);
    const isMdp2Valid = passwordsMatch(mdp1, mdp2);

    // Mettre à jour la couleur des champs et afficher les messages
    updateFieldStatus('nom', isNomValid, 'Le champ Nom ne peut pas être vide.');
    updateFieldStatus('prenom', isPrenomValid, 'Le champ Prénom ne peut pas être vide.');
    updateFieldStatus('adresse', isAdresseValid, 'Le champ Adresse ne peut pas être vide.');
    updateFieldStatus('mail', isMailValid, 'Adresse email non valide.');
    updateFieldStatus('mdp1', isMdp1Valid, 'Le mot de passe doit contenir au moins 1 lettre, 1 chiffre et 1 caractère spécial.');
    updateFieldStatus('mdp2', isMdp2Valid, 'Les mots de passe ne correspondent pas.');

    // Retourner true si tous les champs sont valides, sinon false
    return isNomValid && isPrenomValid && isAdresseValid && isMailValid && isMdp1Valid && isMdp2Valid;
}
