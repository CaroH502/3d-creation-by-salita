<?php
// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $prenom = isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : '';
    $nom = isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $indicatif = isset($_POST['indicatif']) ? htmlspecialchars($_POST['indicatif']) : '';
    $telephone = isset($_POST['telephone']) ? htmlspecialchars($_POST['telephone']) : '';
    $type_projet = isset($_POST['type_projet']) ? htmlspecialchars($_POST['type_projet']) : '';
    $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';
    
    // Handle file uploads
    $uploaded_files = [];
    if (isset($_FILES['files'])) {
        $file_count = count($_FILES['files']['name']);
        
        for ($i = 0; $i < $file_count; $i++) {
            if ($_FILES['files']['error'][$i] === UPLOAD_ERR_OK) {
                $tmp_name = $_FILES['files']['tmp_name'][$i];
                $name = $_FILES['files']['name'][$i];
                $uploaded_files[] = $name;
                
                // Move the uploaded file to a designated folder
                // move_uploaded_file($tmp_name, "uploads/" . $name);
            }
        }
    }
    
    // Here you would typically send an email or save to database
    // For demonstration, we'll just set a success message
    $success_message = "Votre demande de devis a été envoyée avec succès. Nous vous contacterons dans les plus brefs délais.";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de devis - 3D Creation by Salita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'teal': {
                            500: '#0D7A8A',
                            600: '#0A6978',
                            700: '#085967'
                        },
                        'pink': {
                            100: '#FFF0F0',
                            200: '#FFE1E1',
                            300: '#FFD2D2'
                        }
                    },
                    fontFamily: {
                        'sans': ['Montserrat', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Montserrat', sans-serif;
        }
        
        .form-container {
            position: relative;
            max-width: 1000px;
            margin: 0 auto;
            border: 2px solid white;
            border-radius: 4px;
        }
        
        .pink-line {
            position: absolute;
            left: -10px;
            top: 0;
            bottom: 0;
            width: 10px;
            background-color: #FFD2D2;
        }
        
        .required::after {
            content: '*';
            color: #FFD2D2;
            margin-left: 2px;
        }
        
        .file-upload-area {
            border: 2px dashed rgba(255, 255, 255, 0.3);
            border-radius: 4px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
        }
        
        .file-upload-area:hover {
            border-color: white;
        }
    </style>
</head>
<body class="bg-teal-600 text-white min-h-screen py-10 px-4">
    <div class="form-container bg-teal-600 p-8 md:p-12 relative">
        <div class="pink-line"></div>
        
        <!-- Close button -->
        <div class="absolute top-4 right-4">
            <a href="javascript:window.close();" class="text-white hover:text-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
        </div>
        
        <h1 class="text-3xl font-bold text-center mb-8">Demande de devis</h1>
        
        <?php if (isset($success_message)): ?>
            <div class="bg-white text-teal-600 p-6 rounded-md mb-8 text-center">
                <p class="text-xl font-semibold"><?php echo $success_message; ?></p>
                <button onclick="window.close();" class="mt-4 px-6 py-2 bg-teal-600 text-white rounded-md hover:bg-teal-700">
                    Fermer cette fenêtre
                </button>
            </div>
        <?php else: ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                <!-- Coordonnées -->
                <h2 class="text-2xl font-semibold mb-6">Coordonnées</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label for="prenom" class="block mb-2 required">Prénom</label>
                        <input type="text" id="prenom" name="prenom" placeholder="John" required
                               class="w-full p-3 bg-white text-gray-800 rounded-md focus:outline-none focus:ring-2 focus:ring-white">
                    </div>
                    <div>
                        <label for="nom" class="block mb-2 required">Nom de famille</label>
                        <input type="text" id="nom" name="nom" placeholder="Doe" required
                               class="w-full p-3 bg-white text-gray-800 rounded-md focus:outline-none focus:ring-2 focus:ring-white">
                    </div>
                    <div>
                        <label for="email" class="block mb-2 required">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="johndoe@gmail.com" required
                               class="w-full p-3 bg-white text-gray-800 rounded-md focus:outline-none focus:ring-2 focus:ring-white">
                    </div>
                    <div>
                        <label for="telephone" class="block mb-2 required">Téléphone</label>
                        <div class="flex">
                            <select id="indicatif" name="indicatif" class="p-3 bg-white text-gray-800 rounded-l-md border-r border-gray-300 focus:outline-none focus:ring-2 focus:ring-white">
                                <option value="+41">+41</option>
                                <option value="+33">+33</option>
                                <option value="+32">+32</option>
                                <option value="+1">+1</option>
                            </select>
                            <input type="tel" id="telephone" name="telephone" placeholder="79 555 66 77" required
                                   class="flex-1 p-3 bg-white text-gray-800 rounded-r-md focus:outline-none focus:ring-2 focus:ring-white">
                        </div>
                    </div>
                </div>
                
                <!-- Le projet -->
                <h2 class="text-2xl font-semibold mb-6">Le projet</h2>
                
                <div class="mb-6">
                    <label for="type_projet" class="block mb-2 required">Type de projet</label>
                    <div class="relative">
                        <select id="type_projet" name="type_projet" required
                                class="w-full p-3 bg-white text-gray-800 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-white">
                            <option value="amenagement_interieur">Aménagement intérieur</option>
                            <option value="villa_maison">Villa & Maison</option>
                            <option value="immeuble_batiment">Immeuble & Bâtiment</option>
                            <option value="espace_exterieur">Espace Extérieur & Piscine</option>
                            <option value="quartier_urbain">Quartier & Aménagement urbain</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div class="mb-8">
                    <label for="description" class="block mb-2 required">Description du projet</label>
                    <textarea id="description" name="description" rows="6" placeholder="Décrivez en quelques mots votre projet et à quoi vont vous servir les images 3D" required
                              class="w-full p-3 bg-white text-gray-800 rounded-md focus:outline-none focus:ring-2 focus:ring-white"></textarea>
                </div>
                
                <!-- Upload de fichiers -->
                <div class="mb-8">
                    <label class="block mb-2">Télécharger vos fichiers (ex : plans, choix d'aménagements, devis, etc.)</label>
                    <p class="text-sm mb-4">Fichiers trop volumineux : info@3dcreationbysalita.ch</p>
                    
                    <div class="file-upload-area" id="dropzone">
                        <div class="flex flex-col items-center justify-center py-6">
                            <svg class="w-12 h-12 mb-4 text-teal-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M4 22h16a2 2 0 0 0 2-2V8l-6-6H4a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2zm0-18h10v4h4v12H4V4zm2 12h12v2H6v-2zm0-4h12v2H6v-2z"/>
                            </svg>
                            <p class="mb-2">Choisissez un fichier ou faites-le glisser et déposez-le ici.</p>
                            <p class="text-sm">Formats acceptés : .zip, pdf, .xlsx, .png, .jpg, .svg</p>
                            <button type="button" id="upload-btn" class="mt-4 px-4 py-2 bg-white text-teal-600 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-white">
                                Upload
                            </button>
                        </div>
                        <input type="file" id="file-input" name="files[]" multiple class="hidden">
                    </div>
                </div>
                
                <!-- Submit button -->
                <div class="text-center">
                    <button type="submit" class="px-8 py-3 bg-transparent border-2 border-white text-white rounded-md hover:bg-white hover:text-teal-600 focus:outline-none focus:ring-2 focus:ring-white transition duration-300">
                        Envoyer la demande de devis
                    </button>
                </div>
            </form>
        <?php endif; ?>
    </div>
    
    <script src="form-script.js"></script>
</body>
</html>