<?php
try {
    $bdd = new PDO("mysql:host=localhost;charset=utf8;dbname=ckoi1inge","isen","isen");
} catch (PDOException $e) {
    throw new Exception($e->getCode(). ": " . $e->getMessage());
}

if (isset($_POST['submit'])) {
    if(isset($_POST['surname']) && !empty($_POST['surname']) && isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['q1']) && !empty($_POST['q1']) && isset($_POST['q2']) && !empty($_POST['q2']) && isset($_POST['q3']) && !empty($_POST['q3']) && isset($_POST['q5']) && !empty($_POST['q5'])) {
        $surname = htmlspecialchars($_POST['surname']);
        $name = htmlspecialchars($_POST['name']);
        $q1 = htmlspecialchars($_POST['q1']);
        $q2 = htmlspecialchars($_POST['q2']);
        $q3 = htmlspecialchars($_POST['q3']);
        $q4 = isset($_POST['q4']) && !empty($_POST['q4']) ? htmlspecialchars($_POST['q4']) : NULL;
        $q5 = htmlspecialchars($_POST['q5']);

        try {
            $sql = $bdd->prepare("INSERT INTO feedbacks(`nom`, `prenom`, `q1`, `q2`, `q3`, `q4`, `q5`) VALUES (?,?,?,?,?,?,?)");
            $sql->execute(array($surname, $name, $q1, $q2, $q3, $q4, $q5));
        } catch (PDOException $e) {
            throw new Exception($e->getCode(). ": " . $e->getMessage());
        }
        $message = "Votre retour a bien été sauvegardé.";

    } else {
        $error = "As-tu bien rempli les champs nécessaires ?";
    }
} ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Retour d'expérience CKoi1ingé</title>
    <link rel="stylesheet" href="node_modules/tailwindcss/dist/tailwind.css">
</head>
<body>
<?php
if(isset($message)) { ?>
    <div class="bg-green-600" id="banner">
      <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between flex-wrap">
          <div class="w-0 flex-1 flex items-center">
            <p class="ml-3 font-medium text-white truncate">
              <span class="text-white-75">
                Votre retour a bien été enregistré!
              </span>
            </p>
          </div>
          <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
            <button type="button" class="-mr-1 flex p-2 rounded-md hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2" id="dismiss">
              <span class="sr-only">Dismiss</span>
              <!-- Heroicon name: outline/x -->
              <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
<?php } if(isset($error)) { ?>
    <div class="bg-red-600" id="banner">
        <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between flex-wrap">
                <div class="w-0 flex-1 flex items-center">
                    <p class="ml-3 font-medium text-white truncate">
              <span class="text-white-75">
                <?= $error; ?>
              </span>
                    </p>
                </div>
                <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                    <button type="button" class="-mr-1 flex p-2 rounded-md hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2" id="dismiss">
                        <span class="sr-only">Dismiss</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php }?>
<div class="min-h-full flex items-center justify-center px-4 sm:px-4 lg:px-6 pt-2">
    <div class="max-w-md w-full space-y-8">
        <div>
            <img class="mx-auto w-auto" src="src/img/logo.jpg" alt="Logo de l'ISEN">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Merci d'être venu(e) !
            </h2>
        </div>
        <form action="" method="post" class="mt-8 space-y-6" id="form">
            <i>Tous les champs marqués d'une étoile sont obligatoire</i>
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white">
                    <label for="nom" class="block text-sm font-medium text-gray-700">Nom *</label>
                    <input type="text" name="surname" id="nom" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md rounded-b-md focus:outline-none focus:ring-red-500 focus:border-red-500 focus:z-10 sm:text-sm" required autocomplete="off">
                    <label for="prenom">Prénom *</label>
                    <input type="text" name="name" id="prenom" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md rounded-b-md focus:outline-none focus:ring-red-500 focus:border-red-500 focus:z-10 sm:text-sm" required autocomplete="off">
                    <label for="q1">Cette demi-journée vous a-t-elle permis de mieux comprendre le rôle d'une école d'ingénieur ? *</label>
                    <textarea name="q1" id="q1" class="appearance-none rounded-none relative w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md rounded-b-md focus:outline-none focus:ring-red-500 focus:border-red-500 focus:z-10 sm:text-sm" required autocomplete="off"></textarea>
                    <label for="q2">Cette demi-journée vous a-t-elle permis de renforcer votre choix vers les métiers d'ingénieur ? *</label>
                    <textarea name="q2" id="q2" class="appearance-none rounded-none relative w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md rounded-b-md focus:outline-none focus:ring-red-500 focus:border-red-500 focus:z-10 sm:text-sm" required autocomplete="off"></textarea>
                    <label for="q3">Quelle note mettriez-vous pour cette demi-journée ( /5) ? *</label>
                    <select name="q3" id="q3" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm" required>
                        <option value="0" disabled selected>Choisir une note</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <label for="q4">Avez-vous des commentaires ?</label>
                    <textarea name="q4" id="q4" class="appearance-none rounded-none relative w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md rounded-b-md focus:outline-none focus:ring-red-500 focus:border-red-500 focus:z-10 sm:text-sm" autocomplete="off"></textarea>
                    <label for="q5">Comment qualifierez-vous les membres de la promo présents ? *</label>
                    <select name="q5" id="q5" class="pb-3 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm" required>
                        <option value="0" disabled selected>Choisir une option</option>
                        <option value="1">Génial</option>
                        <option value="2">Topissime</option>
                        <option value="3">Les meilleurs du monde</option>
                        <option value="4">Attends je cours chercher une coupe</option>
                        <option value="5">Ils auraient mieux fait de rester au lit</option>
                        <option value="6">Des étudiants de la promo?????</option>
                    </select>

                    <input type="submit" value="Soumettre mon commentaire" name="submit" class="mt-2 group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    <input type="reset" value="Effacer le formulaire" name="reset" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-red bg-white-600 hover:bg-white-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                </div>
            </div>
        </form>
    </div>
</div>

<script src="src/js/index.js"></script>
</body>
</html>
