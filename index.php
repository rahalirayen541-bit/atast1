<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire ATAST Club</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: 
                /* Overlay semi-transparent pour améliorer la lisibilité */
                linear-gradient(135deg, rgba(102, 126, 234, 0.85) 0%, rgba(118, 75, 162, 0.85) 100%),
                /* Image ATAST stylisée */
                url('123456.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .form-container {
            background: rgba(222, 216, 216, 0.95);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 70px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 500px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        /* En-tête avec logos */
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid rgba(102, 126, 234, 0.3);
        }
        
        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-bottom: 15px;
        }
        
        .logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 14px;
            text-align: center;
            padding: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            border: 2px solid white;
        }
        
        .club-title {
            font-size: 28px;
            font-weight: 800;
            color: #333;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .club-subtitle {
            font-size: 18px;
            color: #667eea;
            font-weight: 700;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .student-section {
            font-size: 14px;
            color: #666;
            font-style: italic;
            margin-top: 5px;
            font-weight: 600;
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #444;
            font-size: 14px;
        }
        
        input, select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e1e1e1;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }
        
        input:focus, select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
            background: white;
        }
        
        input.valid, select.valid {
            border-color: #4CAF50;
            background: rgba(76, 175, 80, 0.05);
        }
        
        input.invalid, select.invalid {
            border-color: #f44336;
            background: rgba(244, 67, 54, 0.05);
        }
        
        .error-message {
            color: #f44336;
            font-size: 12px;
            margin-top: 5px;
            display: none;
            font-weight: 500;
        }
        
        .form-note {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
            font-style: italic;
        }
        
        .submit-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 16px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 700;
            width: 100%;
            margin-top: 20px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
        }
        
        .submit-btn:active {
            transform: translateY(-1px);
        }
        
        .required {
            color: #f44336;
        }
        
        .success-message {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-top: 20px;
            display: none;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.4);
        }
        
        /* Style personnalisé pour la liste déroulante */
        select {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23666' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 16px;
            cursor: pointer;
        }
        
        select:focus {
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23667eea' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        }
        
        /* Footer */
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(102, 126, 234, 0.3);
            color: #666;
            font-size: 12px;
            font-weight: 500;
        }
        
        /* Animation pour les logos */
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            33% { transform: translateY(-5px) rotate(1deg); }
            66% { transform: translateY(3px) rotate(-1deg); }
        }
        
        .logo {
            animation: float 4s ease-in-out infinite;
        }
        
        .logo:nth-child(2) {
            animation-delay: 0.7s;
        }
        
        /* Effet de brillance sur le conteneur */
        .form-container::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #667eea, #764ba2, #667eea);
            border-radius: 22px;
            z-index: -1;
            opacity: 0.3;
            filter: blur(5px);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <!-- En-tête avec logos ATAST -->
        <div class="header">
            <div class="logo-container">
                <div class="logo">
                   <img src="123.jpg" alt="" width="50px">
                </div>
                <div class="logo">
                    <img src="rr.png" alt="" width="65px">
                </div>
            </div>
            <div class="club-title">ATAST Club</div>
            <div class="club-subtitle">Inscription Membre</div>
            <div class="student-section">STUDENT SECTION</div>
        </div>
        
        <form id="personalForm">
            <!-- Champ Nom -->
            <div class="form-group">
                <label for="nom">Nom <span class="required">*</span></label>
                <input type="text" id="nom" name="nom" required 
                       placeholder="Entrez votre nom">
                <div class="error-message" id="nom-error">Le nom ne doit contenir que des lettres</div>
            </div>
            
            <!-- Champ Prénom -->
            <div class="form-group">
                <label for="prenom">Prénom <span class="required">*</span></label>
                <input type="text" id="prenom" name="prenom" required 
                       placeholder="Entrez votre prénom">
                <div class="error-message" id="prenom-error">Le prénom ne doit contenir que des lettres</div>
            </div>
            
            <!-- Champ Niveau (liste déroulante) -->
        <div class="form-group">
                <label for="niveau">Niveau <span class="required">*</span></label>
                <select id="niveau" name="niveau" required>
                    <option value="">Sélectionnez votre niveau</option>
                    <option value="bac">1 SI</option>
                    <option value="bac+1">1 ISI</option>
                    <option value="bac+2"> 1 MATH Appliquer</option>
                    <option value="bac+3">2 SI </option>
                    <option value="bac+4">2 ISI</option>
                    <option value="bac+5">3 SI </option>
                    <option value="bac+6">3 ISI</option>
                    <option value="autre">1 MASTER DATA SIENCE</option>
                    <option value="autre">1 MASTER ASSIR</option>
                    <option value="autre">1 MASTER MATH Appliquer</option>
                </select>
                <div class="error-message" id="niveau-error">Veuillez sélectionner votre niveau</div>
            </div>
            
            <!-- Champ Numéro de Carte CIN -->
            <div class="form-group">
                <label for="cin">Numéro de Carte CIN <span class="required">*</span></label>
                <input type="text" id="cin" name="cin" required 
                       placeholder="Ex: 01234567"
                       maxlength="8">
                <div class="error-message" id="cin-error">Le numéro CIN doit commencer par 0 ou 1, être numérique et avoir 8 caractères maximum</div>
                <div class="form-note">Doit commencer par 0 ou 1, être numérique et avoir maximum 8 chiffres</div>
            </div>
            
            <!-- Champ Numéro de Téléphone -->
            <div class="form-group">
                <label for="telephone">Numéro de Téléphone <span class="required">*</span></label>
                <input type="text" id="telephone" name="telephone" required 
                       placeholder="Ex: 55123456"
                       maxlength="8">
                <div class="error-message" id="telephone-error">Le numéro de téléphone doit être numérique et avoir 8 chiffres maximum</div>
                <div class="form-note">8 chiffres maximum</div>
            </div>
            
            <!-- Champ Adresse Email -->
            <div class="form-group">
                <label for="email">Adresse Email <span class="required">*</span></label>
                <input type="email" id="email" name="email" required 
                       placeholder="Ex: exemple@email.com">
                <div class="error-message" id="email-error">Veuillez entrer une adresse email valide</div>
            </div>
            
            <!-- Bouton de soumission -->
            <button type="submit" class="submit-btn">Devenir Membre ATAST</button>
            
            <!-- Message de succès -->
            <div class="success-message" id="success-message">
                ✅ Félicitations ! Votre inscription au club ATAST a été soumise avec succès !
            </div>
        </form>
        
        <!-- Footer -->
        <div class="footer">
            ATAST Club &copy; 2024 - Tous droits réservés
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('personalForm');
            const inputs = document.querySelectorAll('input, select');
            
            // Fonction de validation pour le nom et prénom (lettres uniquement)
            function validateName(name) {
                const nameRegex = /^[A-Za-zÀ-ÿ\s]+$/;
                return nameRegex.test(name);
            }
            
            // Fonction de validation pour le CIN
            function validateCIN(cin) {
                // Doit être numérique, commencer par 0 ou 1, et avoir max 8 caractères
                const cinRegex = /^[0-1][0-9]{0,7}$/;
                return cinRegex.test(cin) && cin.length <= 8;
            }
            
            // Fonction de validation pour le téléphone
            function validatePhone(phone) {
                // Doit être numérique et avoir max 8 caractères
                const phoneRegex = /^[0-9]{1,8}$/;
                return phoneRegex.test(phone);
            }
            
            // Fonction de validation pour l'email
            function validateEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }
            
            // Fonction de validation pour le niveau
            function validateNiveau(niveau) {
                return niveau !== '';
            }
            
            // Validation en temps réel pour chaque champ
            inputs.forEach(input => {
                // Pour les champs de texte
                if (input.type !== 'select-one') {
                    input.addEventListener('input', function() {
                        validateField(this);
                    });
                    
                    input.addEventListener('blur', function() {
                        validateField(this);
                    });
                }
                
                // Pour la liste déroulante
                if (input.tagName === 'SELECT') {
                    input.addEventListener('change', function() {
                        validateField(this);
                    });
                }
            });
            
            // Fonction de validation d'un champ individuel
            function validateField(field) {
                const value = field.value.trim();
                const errorElement = document.getElementById(field.id + '-error');
                
                // Réinitialiser l'état
                field.classList.remove('valid', 'invalid');
                errorElement.style.display = 'none';
                
                // Si le champ est vide, on ne valide pas (sauf si required et vide au submit)
                if (value === '' && !field.hasAttribute('required')) {
                    return true;
                }
                
                let isValid = false;
                
                // Validation selon le type de champ
                switch(field.id) {
                    case 'nom':
                    case 'prenom':
                        isValid = validateName(value);
                        break;
                    case 'niveau':
                        isValid = validateNiveau(value);
                        break;
                    case 'cin':
                        isValid = validateCIN(value);
                        break;
                    case 'telephone':
                        isValid = validatePhone(value);
                        break;
                    case 'email':
                        isValid = validateEmail(value);
                        break;
                }
                
                // Appliquer le style approprié
                if (isValid) {
                    field.classList.add('valid');
                } else {
                    field.classList.add('invalid');
                    errorElement.style.display = 'block';
                }
                
                return isValid;
            }
            
            // Validation du formulaire complet
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                let isFormValid = true;
                
                // Valider chaque champ
                inputs.forEach(input => {
                    const isValid = validateField(input);
                    if (!isValid) {
                        isFormValid = false;
                    }
                });
                
                // Vérifier que tous les champs requis sont remplis
                inputs.forEach(input => {
                    if (input.hasAttribute('required') && input.value.trim() === '') {
                        input.classList.add('invalid');
                        const errorElement = document.getElementById(input.id + '-error');
                        errorElement.style.display = 'block';
                        
                        // Message d'erreur personnalisé pour la liste déroulante
                        if (input.id === 'niveau') {
                            errorElement.textContent = 'Veuillez sélectionner votre niveau';
                        } else {
                            errorElement.textContent = 'Ce champ est obligatoire';
                        }
                        
                        isFormValid = false;
                    }
                });
                
                // Si le formulaire est valide, afficher le message de succès
                if (isFormValid) {
                    document.getElementById('success-message').style.display = 'block';
                    
                    // Afficher les données soumises dans la console (pour test)
                    const formData = new FormData(form);
                    console.log('Données du formulaire ATAST:');
                    for (let [key, value] of formData.entries()) {
                        console.log(`${key}: ${value}`);
                    }
                    
                    // Réinitialiser le formulaire après 3 secondes
                    setTimeout(() => {
                        form.reset();
                        document.getElementById('success-message').style.display = 'none';
                        inputs.forEach(input => {
                            input.classList.remove('valid', 'invalid');
                        });
                    }, 3000);
                }
            });
        });
    </script>
</body>
</html>