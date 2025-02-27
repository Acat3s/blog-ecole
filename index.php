<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="Blog Posts">
        <meta name="description" content="">
        <meta name="generator" content="Nicepage 7.0.3, nicepage.com">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">


        <title>Charles de Foucauld - SIO</title>

        <script src="https://kit.fontawesome.com/81c2f751c8.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
        <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>


        <link rel="stylesheet" href="index.css">
        <link rel="icon" href="img/icon.png">
        <link rel="stylesheet" href="nicepage.css" media="screen">
        <link rel="stylesheet" href="index.css" media="screen">
        <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
        <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700">
 
        
    </head>
    
    
    <body>
        <div class="header">
            <table>
                <td>
                    <i class="fa-solid fa-school icon"></i>
                </td>
                <td class="titre">
                    <b class="titre">Charles de Foucauld</b>
                </td>
                <td>
                    <a class="nav" href="#sio">BTS SIO <i class="fa-solid fa-computer"></i></a>
                    <div class="dropdown-menu">
                        <a class="nav" href="#" id="specialites">Spécialités <i class="fa-solid fa-caret-down"></i></a>
                        <div class="dropdown-content">
                            <a class="dropdown" href="#sisr"><i class="fa-solid fa-wifi"></i> SISR</a>
                            <a class="dropdown" href="#slam"><i class="fa-solid fa-code"></i> SLAM</a>
                        </div>
                    </div>
                    <a class="nav" href="#resulstats">Résultats <i class="fa-solid fa-square-poll-vertical"></i></a>
                    <a class="nav" href="#localisation">Où nous trouver <i class="fa-solid fa-location-dot"></i></a>
                </td>
            </table>
        </div>
        <div class="home">
            <h3 style="color: #62838b; margin: 10px 20px;">Espace</h1>
            <h3 style="color: #74b1be; margin: 10px 20px">Blog</h1>
        </div>
        <div class="blog-header">
          Articles
      </div>
      <div class="blue-box"></div>
      



        <!-- Debut blog -->

        <section id="blog">
    <h2>Derniers articles</h2>
    <div class="blog-container">
        <?php
        // Connexion à la base de données
        $host = "localhost";
        $dbname = "Dieu";
        $user = "root";
        $password = "Iroise29";

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }

        // Requête pour récupérer les articles
        $sql = "SELECT * FROM articles ORDER BY date_publication DESC";
        $articles = $pdo->query($sql);

        // Boucle pour afficher chaque article
        foreach ($articles as $article): ?>
            <div class="blog-card">
                <!-- Vérification de l'image -->
                <?php if (!empty($article['image'])): ?>
                    <img src="<?= htmlspecialchars($article['image']); ?>" alt="Image de l'article" class="blog-image">
                <?php else: ?>
                    <img src="img/default.jpg" alt="Image par défaut" class="blog-image">
                <?php endif; ?>

                <div class="blog-content">
                    <p class="blog-date">
                        <?= htmlspecialchars($article['date_publication']); ?> | <?= htmlspecialchars($article['auteur']); ?>
                    </p>
                    <h3 class="blog-heading">
                        <?= htmlspecialchars($article['titre']); ?>
                    </h3>
                    <p class="blog-text">
                        <?= nl2br(htmlspecialchars($article['contenue'])); ?>
                    </p>
                    <a href="#" class="blog-link">Lire plus</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>





<!-- Debut Code de base -->

      </div>
      <div class="content">
          <section id="sio">
              <h3 class="titre_paragraphe">Le BTS SIO répond aux exigences des entreprises en formant :</h3>
              <table>
                  <tr>
                      <th>
                          <img class="img_paragraphe" src="https://cdn-icons-png.flaticon.com/512/4133/4133318.png">
                      </th>
                      <th>
                          <img class="img_paragraphe" src="https://cdn-icons-png.flaticon.com/512/1995/1995545.png">
                      </th>
                  </tr>
                  <tr>
                      <th class="bloc">
                          <p>
                              Des spécialistes aptes à occuper rapidement un emploi d’administrateur de réseaux locaux d’entreprise ou de développeur d’applications.
                          </p>
                      </th>
                      <th class="bloc">
                          <p>
                              Des techniciens du numérique et de la cybersécurité capables d’évoluer et de s’adapter rapidement.
                          </p>
                      </th>
                  </tr>
              </table>
              <h3 class="titre_paragraphe">Les titulaires du BTS SIO des deux spécialités partagent des compétences de plusieurs domaines.</h3> 
              <table>
                  <tr>
                      <th>
                          <img class="img_paragraphe" src="https://cdn-icons-png.flaticon.com/512/3246/3246923.png">
                      </th>
                      <th>
                          <img class="img_paragraphe" src="https://cdn-icons-png.flaticon.com/512/2716/2716652.png">
                      </th>
                  </tr>
                  <tr>
                      <th class="bloc">
                          <p>
                          <strong>Support et mise à disposition de services informatiques :</strong> répondre aux attentes des utilisateurs en assurant la disponibilité des services informatiques; gérer le patrimoine informatique, répondre aux incidents, développer la présence de l’entreprise sur le web…
                          </p>
                      </th>
                      <th class="bloc">
                          <p>
                          <strong>Cybersécurité :</strong>  protéger l’informatique de l’entreprise face à des cyberattaques en tenant compte des dimensions techniques, organisationnelles, juridiques…
                          </p>
                      </th>
                  </tr>
              </table>
          </section>
          <section id="sisr">
              <div id="div_spec">
                  <h3 class="titre_paragraphe"><i class="fa-solid fa-wifi"></i>  Qu'est ce qu'est la spécialité SISR ?</h2>
                  <table>
                      <tr>
                      <tr>
                          <th class="bloc2">
                              <p>        
                                  Le titulaire du BTS SIO, spécialité Solutions d’Infrastructure, Systèmes et Réseaux participe à la production, la gestion et la supervision des équipements et services informatiques. Il intervient plus particulièrement dans :
                              </p>
                              <ul>
                                  <li>Etude, intégration, administration et supervision des installations informatiques.</li>
                                  <li>Cybersécurisation d’une infrastructure réseau, d’un système ou d’un service informatique.</li>
                              </ul>
                              <h4 class="titre_paragraphe">Exemple de métiers :</h3>
                              <ul>
                                  <li>Administrateur systèmes et réseaux.</li>
                                  <li>Technicien support et déploiement systèmes et réseaux.</li>
                                  <li>Technicien d’infrastructure systèmes et réseaux, etc.</li>
                              </ul>
                          </th>
                          <th class="bloc2">
                              <img class="illustrations" src="img/sisr1.JPG" alt="">
                          </th>
                      </tr>
                  </table>
              </div>
          </section>
          <section id="slam">
              <div id="div_spec">
                  <h3 class="titre_paragraphe"><i class="fa-solid fa-code"></i>  Qu'est ce qu'est la spécialité SLAM ?</h2>
                  <table>
                      <tr>
                      <tr>
                          <th class="bloc2">
                              <img class="illustrations" src="img/slam3.jpeg" alt="">
                          </th>
                          <th class="bloc2">
                              <p>
                                  Le spécialiste Solutions logicielles et applications métiers participe à la conception, au développement ou à la maintenance de logiciels. Il sécurise la production et la fourniture du service. Il intervient plus particulièrement dans la :
                              </p>
                              <ul>
                                  <li>Définition des spécifications techniques à partir de l’expression de besoin des utilisateurs et des contraintes de l’entreprise.</li>
                                  <li>Programmation, test et documentation de modules logiciels.</li>
                                  <li>Gestion des données.</li>
                              </ul>
                              <h4 class="titre_paragraphe">Exemple de métiers :</h3>
                              <ul>
                                  <li>Analyste programmeur.</li>
                                  <li>Développeur d’application web, base de données, mobile, multimédia.</li>
                                  <li>Métiers du web (Webmaster, intégrateur web, etc.).</li>
                                  <li>Assistance aux utilisateur, etc.</li>
                              </ul>
                          </th>
                      </tr>
                  </table>
              </div>
          </section>
          <section id="resulstats">
              <h3 class="titre_paragraphe"><i class="fa-solid fa-square-poll-vertical"></i>  Résultats au BTS SIO des 5 dernières année de la section</h3>
              <table class="resultats">
                  <thead>
                          <th class="resultats"></th>
                          <th class="resultats">Bilan des 5 ans</th>
                          <th class="resultats">2018</th>
                          <th class="resultats">2019</th>
                          <th class="resultats">2020</th>
                          <th class="resultats">2021</th>
                          <th class="resultats">2022</th>
                  </thead>
                  <tbody>
                      <tr>
                          <td class="resultats">SISR</td>
                          <td class="resultats">95,96%</td>
                          <td class="resultats">93,8%</td>
                          <td class="resultats">100%</td>
                          <td class="resultats">100%</td>
                          <td class="resultats">100%</td>
                          <td class="resultats">86%</td>
                       </tr>
                      <tr>
                          <td class="resultats">SLAM</td>
                          <td class="resultats">96,76%</td>
                          <td class="resultats">83,8%</td>
                          <td class="resultats">100%</td>
                          <td class="resultats">100%</td>
                          <td class="resultats">100%</td>
                          <td class="resultats">100%</td>
                      </tr>
                  </tbody>
              </table>
          </section>
          <section id="localisation">
              <h3 class="titre_paragraphe"><i class="fa-solid fa-location-dot"> </i> Où se situe Charles de Foucauld ?</h3>
              <iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1628.511263168623!2d-4.460270170178263!3d48.4031068060205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe66ff117f411e4f6!2sGroupe%20Scolaire%20de%20L&#39;Estran!5e0!3m2!1sfr!2sfr!4v1670105929252!5m2!1sfr!2sfr"></iframe>         
          </section>
      </div>
      <footer>
          <div class="footer">
              <a class="socials" href="https://www.facebook.com/groupescolaireestran"><i class="fa-brands fa-facebook socials"></i></a>
              <a class="socials" href="https://www.linkedin.com/company/groupe-scolaire-de-l-estran/"><i class="fa-brands fa-linkedin socials"></i></a>
              <a class="socials" href="https://www.instagram.com/groupescolaireestran/"><i class="fa-brands fa-instagram socials"></i></a>
              <a class="socials" href="https://www.youtube.com/channel/UCC5AnZXKhCC4Zr-2b07zUUg"><i class="fa-brands fa-youtube socials"></i></a>
          </div>
      </footer>
      

        
    </body>
</html>

<!-- Fin Code de base -->