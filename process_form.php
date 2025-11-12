<?php
// Inclure la configuration
require_once 'config.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Initialiser les variables d'erreur et de succès
    $errors = [];
    $success = false;
    
    // Récupérer et valider les données
    $nom = validateData($_POST['nom']);
    $prenom = validateData($_POST['prenom']);
    $niveau = validateData($_POST['niveau']);
    $cin = validateData($_POST['cin']);
    $telephone = validateData($_POST['telephone']);
    $email = validateData($_POST['email']);
    
    // Validation du nom
    if (empty($nom)) {
        $errors['nom'] = "Le nom est obligatoire";
    } elseif (!preg_match("/^[A-Za-zÀ-ÿ\s]+$/", $nom)) {
        $errors['nom'] = "Le nom ne doit contenir que des lettres";
    }
    
    // Validation du prénom
    if (empty($prenom)) {
        $errors['prenom'] = "Le prénom est obligatoire";
    } elseif (!preg_match("/^[A-Za-zÀ-ÿ\s]+$/", $prenom)) {
        $errors['prenom'] = "Le prénom ne doit contenir que des lettres";
    }
    
    // Validation du niveau
    if (empty($niveau)) {
        $errors['niveau'] = "Le niveau est obligatoire";
    }
    
    // Validation du CIN
    if (empty($cin)) {
        $errors['cin'] = "Le numéro CIN est obligatoire";
    } elseif (!preg_match("/^[0-1][0-9]{0,7}$/", $cin) || strlen($cin) > 8) {
        $errors['cin'] = "Le numéro CIN doit commencer par 0 ou 1, être numérique et avoir 8 caractères maximum";
    }
    
    // Validation du téléphone
    if (empty($telephone)) {
        $errors['telephone'] = "Le numéro de téléphone est obligatoire";
    } elseif (!preg_match("/^[0-9]{1,8}$/", $telephone)) {
        $errors['telephone'] = "Le numéro de téléphone doit être numérique et avoir 8 chiffres maximum";
    }
    
    // Validation de l'email
    if (empty($email)) {
        $errors['email'] = "L'email est obligatoire";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Format d'email invalide";
    }
    
    // Si aucune erreur, insérer dans la base de données
    if (empty($errors)) {
        try {
            $pdo = connectDB();
            
            // Vérifier si le CIN existe déjà
            $stmt = $pdo->prepare("SELECT id FROM membres WHERE cin = ?");
            $stmt->execute([$cin]);
            if ($stmt->rowCount() > 0) {
                $errors['cin'] = "Ce numéro CIN est déjà enregistré";
            }
            
            // Vérifier si l'email existe déjà
            $stmt = $pdo->prepare("SELECT id FROM membres WHERE email = ?");
            $stmt->execute([$email]);
            if ($stmt->rowCount() > 0) {
                $errors['email'] = "Cet email est déjà enregistré";
            }
            
            // Si toujours pas d'erreurs, insérer le membre
            if (empty($errors)) {
                $stmt = $pdo->prepare("INSERT INTO membres (nom, prenom, niveau, cin, telephone, email) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([$nom, $prenom, $niveau, $cin, $telephone, $email]);
                
                if ($stmt->rowCount() > 0) {
                    $success = true;
                    $last_id = $pdo->lastInsertId();
                }
            }
            
        } catch (PDOException $e) {
            $errors['database'] = "Erreur lors de l'enregistrement: " . $e->getMessage();
        }
    }
    
    // Préparer la réponse JSON
    $response = [
        'success' => $success,
        'errors' => $errors,
        'message' => $success ? "Félicitations ! Votre inscription au club ATAST a été soumise avec succès !" : "Veuillez corriger les erreurs ci-dessous"
    ];
    
    // Retourner la réponse en JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
    
} else {
    // Rediriger vers le formulaire si accès direct
    header("Location: index.html");
    exit;
}
?>